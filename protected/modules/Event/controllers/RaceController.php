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

class RaceController extends \yupe\components\controllers\FrontController
{

    public function init()
    {
        parent::init();
        $this->layout =  'themes.sportEvents.views.layouts.column2';
    }
    /**
     * Действие "по умолчанию"
     *
     * @return void
     */
	public function actionIndex()
	{
        $this->redirect('/');
/*        $this->breadcrumbs = 'Races';
        $model = new Event('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Event') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Event'));
        $this->render('index', ['model' => $model->findAll()]);*/
	}

    /**
     * Отображает Мероприятие по указанному идентификатору
     *
     * @param integer $id Идинтификатор Мероприятие для отображения
     *
     * @return void
     */
    public function actionView($id)
    {
        $model = new EventMembers;
//        $model = EventMembers::model();
        if (Yii::app()->getRequest()->getPost('EventMembers') !== null) {
            $this->actionMemberRegistration();
            $model->setAttributes(Yii::app()->getRequest()->getPost('EventMembers'));

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('EventModule.Event', 'Запись добавлена!')
                );

                $this->redirect(
                    (array)Yii::app()->getRequest()->getPost(
                        'submit-type',
                        [
                            'update',
                            'id' => $model->id
                        ]
                    )
                );
            }
        }
        $this->render('view', ['model' => $this->loadModel($id), 'memberModel' => $model ]);
    }

    public function actionMemberRegistration(){
        $model = new EventMembers;
        if (Yii::app()->getRequest()->getPost('EventMembers') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('EventMembers'));

            if (Yii::app()->getUser()->isGuest){
                $this->redirect('/login');
            }

            $order = new EventOrders('insert');
            $organizer = MyEvent::model()->findByPk($model->event_id)->organizer;
            $race = Races::model()->findByPk($model->race_id);
            $order->event_id = $model->event_id;
            $order->race_id = $model->race_id;

            $order->organizer_id = !empty($organizer->id) ? $organizer->id : null;
            $order->user_id = Yii::app()->getUser()->getId();
            $order->amount = $race->cost;
            $order->promo_code = '';
            if (!empty($race->cost) && $race->cost != 0){
                $order->payment_status = EventOrders::NOT_PAYED;
            } else {
                $order->payment_status = EventMembers::PAYMENT_FREE;
            }

            if ($model->save()) {
                $order->event_member_id = $model->id;
                if (!$order->save()){
                    Yii::app()->user->setFlash(yupe\widgets\YFlashMessages::ERROR_MESSAGE, Yii::t('EventModule.Event', 'Сталась помилка!'));
                    $model->delete();
                    return false;
                }
                if (!empty($race->cost) && $race->cost != 0) {
                    $redirect = Yii::app()->createUrl('/payment/payProcess', ['order' => $order->id]);
                    $this->redirect($redirect);
                } else {
                    $this->redirect('/profile');
                }
//
//                $this->redirect(
//                    (array)Yii::app()->getRequest()->getPost(
//                        'submit-type',
//                        [
//                            'update',
//                            'id' => $model->id
//                        ]
//                    )
//                );
            }
        }
//        $this->render('view', ['model' => $this->loadModel($model->race_id), 'memberModel' => $model ]);
//        $this->redirect('/race/'.$model->race_id);
//        todo return error|member registration widget
    }


    /**
     * Возвращает модель по указанному идентификатору
     * Если модель не будет найдена - возникнет HTTP-исключение.
     *
     * @param integer идентификатор нужной модели
     *
     * @return void
     */
    public function loadModel($id)
    {
        $model = Races::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('EventModule.Event', 'Запрошенная страница не найдена.'));

        return $model;
    }
}