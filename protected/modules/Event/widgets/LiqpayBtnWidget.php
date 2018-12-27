<?php

/**
 * BlogsWidget виджет для вывода блогов
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2013 amyLabs && Yupe! team
 * @package yupe.modules.blog.widgets
 * @since 0.1
 *
 */

Yii::import('application.modules.Event.models.Event');

/**
 * Class BlogsWidget
 */
class LiqpayBtnWidget extends yupe\widgets\YWidget
{
    /**
     * @var string
     */
    public $view = 'liqpay_btn_widget';

    public $public_key;
    public $private_key;
    public $cost;

    /**
     * @var LiqPay
     */
    private $liqpay;

    /**
     * @var array
     */
    public $params;

//    public $model;

    public function init()
    {
        parent::init();
        Yii::import('application.extensions.Liqpay.*');
        $this->liqpay = new LiqPay($this->public_key, $this->private_key);
        $params = [
            'action'         => 'pay',
            'amount'         => $this->cost,
            'currency'       => LiqPay::CURRENCY_UAH,
            'description'    => 'description text',
            'order_id'       => 'order_id_1',
            'version'        => '3',
            'language'        => 'uk',
            'result_url'        => '',//URL в Вашем магазине на который покупатель будет переадресован после завершения покупки. Максимальная длина 510 символов
            'sandbox'        => '',//Включает тестовый режим. Средства с карты плательщика не списываются. Для включения тестового режима необходимо передать значение 1. Все тестовые платежи будут иметь статус sandbox - успешный тестовый платеж.
            'server_url'        => '',//URL API в Вашем магазине для уведомлений об изменении статуса платежа (сервер->сервер). Максимальная длина 510 символов. Подробнее
            'sender_city'       => '',
            'sender_first_name'       => '',
            'sender_last_name'       => '',
            'product_name'       => '',
            'product_url'       => '',
        ];
        if (!empty($this->params)){
            $this->params = array_merge($params, $this->params);
        } else {
            $this->params = $params;
        }
    }

    /**
     * @throws CException
     */
    public function run()
    {
//        return $this->liqpay->cnb_form($this->params);
        echo $this->liqpay->cnb_form($this->params);
    }
}
