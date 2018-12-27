<?php
/**
* EventBackendController контроллер для Event в панели управления
*
* @author yupe team <team@yupe.ru>
* @link http://yupe.ru
* @copyright 2009-2018 amyLabs && Yupe! team
* @package yupe.modules.Event.controllers
* @since 0.1
*
*/

//class LiqpayPaymentController extends CController
class LiqpayPaymentController extends \yupe\components\controllers\FrontController
{

    public function init()
    {
        Yii::import('application.extensions.Liqpay.*');
        parent::init();
        $this->layout =  'themes.sportEvents.views.layouts.column2';
    }

    public function actionPayProcess($id = null)
    {
        $order_id = Yii::app()->getRequest()->getParam('order');

        if (empty($order_id)){
            throw new CHttpException(404, Yii::t('EventModule.Event', 'order_id undefined'));
        }

        /**
         * @var EventOrders $order
         */
        $order = EventOrders::model()->findByPk($order_id);

        if (empty($order)){
            throw new CHttpException(404, Yii::t('EventModule.Event', "order {$order_id} not found"));
        }

        /**
         * @var Races $race
         */
        $race = Races::model()->findByPk($order->race_id);

        /**
         * @var MyEvent $event
         */
        $event = MyEvent::model()->findByPk($order->event_id);

        /**
         * @var EventOrganizers $organizer
         */
        $organizer = EventOrganizers::model()->findByPk($order->organizer_id);
        /**
         * @var EventMembers $member
         */
        $member = EventMembers::model()->findByPk($order->event_member_id);

        if (empty($race) || empty($event) || empty($organizer)){
            throw new CHttpException(404, Yii::t('EventModule.Event', "order data {$order_id} invalid"));
        }

        $order->payment_status = EventOrders::PAYMENT_WAIT;
        $order->save();

        $params = [
            'action'                => 'pay',
            'amount'                => $order->amount,
            'currency'              => LiqPay::CURRENCY_UAH,
            'description'           => sprintf('%s - %s: %s', Yii::t('EventModule.Event', 'Оплата за участь у змаганнях'), $event->name, $race->title),
            'order_id'              => $order->id.'-'.uniqid(),
            'version'               => '3',
            'language'              => 'uk',
            'result_url'            => Yii::app()->createAbsoluteUrl('profile'),
            'sandbox'               => '1',//Включает тестовый режим. Средства с карты плательщика не списываются. Для включения тестового режима необходимо передать значение 1. Все тестовые платежи будут иметь статус sandbox - успешный тестовый платеж.
            'server_url'            => Yii::app()->createAbsoluteUrl('payment/success'),//URL API в Вашем магазине для уведомлений об изменении статуса платежа (сервер->сервер). Максимальная длина 510 символов. Подробнее
            'sender_city'           => $member->city,
            'sender_first_name'     => $member->first_name,
            'sender_last_name'      => $member->last_name,
            'product_name'          => $race->title,
            'product_url'           => Yii::app()->createAbsoluteUrl('race/'.$race->id),
//            'expired_date'
        ];
        $this->render('pay_process', ['params' => $params, 'order' => $order, 'organizer' => $organizer]);
    }

    public function actionSuccess()
    {
        $dataEncoded = Yii::app()->getRequest()->getPost('data');
        $signature = Yii::app()->getRequest()->getPost('signature');
        if (empty($dataEncoded)){
            throw new CHttpException(400, Yii::t('EventModule.Event', "data is empty"));
        }
        $data = base64_decode($dataEncoded);
        $dataObj = json_decode($data);
        $orde_id = explode('-', $dataObj->order_id);
        $orde_id = $orde_id[0];

        /**
         * @var EventOrders $order
         */
        $order = EventOrders::model()->findByPk($orde_id);
        if (empty($order)){
            throw new CHttpException(403, Yii::t('EventModule.Event', "order incorrect"));
        }

        /**
         * @var EventOrganizers $organizer
         */
        $organizer = EventOrganizers::model()->findByPk($order->organizer_id);
        if (empty($organizer)){
            throw new CHttpException(403, Yii::t('EventModule.Event', "organizer incorrect"));
        }

        $sign = base64_encode(sha1($organizer->private_key . $dataEncoded . $organizer->private_key, 1 ));

        if ($signature != $sign){
//            throw new CHttpException(403, Yii::t('EventModule.Event', "signature incorrect"));
        }

        if ($dataObj->amount != $order->amount){
            throw new CHttpException(403, Yii::t('EventModule.Event', "amount incorrect"));
        }

        $payment = $this->savePayment($dataObj);

        if ($dataObj->status == 'success'){
            $order->payment_status = EventOrders::PAYMENT_SUCCESS;
        } else {
            $order->payment_status = EventOrders::PAYMENT_ERROR;
        }
        $order->payment_status = $dataObj->status;
        $order->payment_id = !empty($payment->id) ? $payment->id : '';
        $order->update_user_id = 0;
        $order->save();

        /**
         * @var EventMembers $member
         */
        $member = EventMembers::model()->findByPk($order->event_member_id);
        if ($dataObj->status == 'success'){
            $member->payment_status = EventMembers::PAYMENT_SUCCESS;
        } else {
            $member->payment_status = EventMembers::PAYMENT_ERROR;
        }
        $member->update_user_id = 0;
        $member->save();
        echo 1;
        die;
    }

    /**
     * @param $data
     * @return EventPayments
     */
    protected function savePayment($data){
        /**
         * @var EventPayments $payment
         */
        $payment = new EventPayments();
        $payment->payment_id = !empty($data->payment_id) ? $data->payment_id : '';
        $payment->status = !empty($data->status) ? $data->status : '';
        $payment->paytype = !empty($data->paytype) ? $data->paytype : '';
        $payment->public_key = !empty($data->public_key) ? $data->public_key : '';
        $payment->order_id = !empty($data->order_id) ? $data->order_id : '';
        $payment->liqpay_order_id = !empty($data->liqpay_order_id) ? $data->liqpay_order_id : '';
        $payment->description = !empty($data->description) ? $data->description : '';
        $payment->sender_phone = !empty($data->sender_phone) ? $data->sender_phone : '';
        $payment->sender_card_bank = !empty($data->sender_card_bank) ? $data->sender_card_bank : '';
        $payment->sender_card_type = !empty($data->sender_card_type) ? $data->sender_card_type : '';
        $payment->ip = !empty($data->ip) ? $data->ip : '';
        $payment->info = !empty($data->info) ? $data->info : '';
        $payment->amount = !empty($data->amount) ? $data->amount : '';
        $payment->currency = !empty($data->currency) ? $data->currency : '';
        $payment->transaction_id = !empty($data->transaction_id) ? $data->transaction_id : '';
        $payment->full_data = json_encode($data);
        $payment->save();
        return $payment;
    }


    /**
     * Действие "по умолчанию"
     *
     * @return void
     */
	public function actionIndex()
	{
//        $this->breadcrumbs = 'Events';
//        $model = new Event('search');
//        $model->unsetAttributes(); // clear any default values
//        if (Yii::app()->getRequest()->getParam('Event') !== null)
//            $model->setAttributes(Yii::app()->getRequest()->getParam('Event'));
//        $this->render('index', ['model' => $model->findAll()]);
	}

    /**
     * Отображает Мероприятие по указанному идентификатору
     *
     * @param integer $id Идинтификатор Мероприятие для отображения
     *
     * @return void
     * @throws Exception
     */
    public function actionView($id)
    {
//        $this->render('view', ['model' => $this->loadModel($id)]);
    }


    /**
     * Возвращает модель по указанному идентификатору
     * Если модель не будет найдена - возникнет HTTP-исключение.
     *
     * @param integer идентификатор нужной модели
     *
     * @return void
     * @throws Exception
     */
    public function loadModel($id)
    {
//        $model = Event::model()->findByPk($id);
//        if ($model === null)
//            throw new CHttpException(404, Yii::t('EventModule.Event', 'Запрошенная страница не найдена.'));
//
//        return $model;
    }
}