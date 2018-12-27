<?php
/**
 * Файл настроек для модуля Event
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2018 amyLabs && Yupe! team
 * @package yupe.modules.Event.install
 * @since 0.1
 *
 */
return [
    'import' => [
        'application.modules.yupe.components.validators.*',
        'application.modules.yupe.components.exceptions.*',
        'application.modules.yupe.extensions.tagcache.*',
        'application.modules.yupe.helpers.*',
        'application.modules.yupe.models.*',
        'application.modules.yupe.widgets.*',
        'application.modules.yupe.controllers.*',
//        'application.modules.yupe.components.*',
    ],
    'module'    => [
        'class' => 'application.modules.Event.EventModule',
        'components' => [
            'bootstrap' => [
                'class' => 'vendor.clevertech.yii-booster.src.components.Booster',
                'coreCss' => true,
                'responsiveCss' => true,
                'yiiCss' => true,
                'jqueryCss' => true,
                'enableJS' => true,
                'fontAwesomeCss' => true,
                'enableNotifierJS' => false,
            ],
        ],
        'visualEditors' => [
            'redactor' => [
                'class' => 'yupe\widgets\editors\Redactor',
            ],
            'ckeditor' => [
                'class' => 'yupe\widgets\editors\CKEditor',
            ],
            'textarea' => [
                'class' => 'yupe\widgets\editors\Textarea',
            ],
        ],
    ],
//    'import'    => [],
    'component' => [
        'request' => [
            'noCsrfValidationRoutes' => [
                'payment/success',
                'Event/LiqpayPayment/success'
            ],
        ],
    ],
    'rules'     => [
        '/Event' => 'Event/Event/index',
        '/' => 'Event/Event/index',
        '/event/<id:\d+>' => 'Event/Event/view',
        '/race/<id:\d+>' => 'Event/Race/view',
        '/races/<id:\d+>' => 'Event/Race/view',
        '/races/<action:\w+>/<id:\d+>' => 'Event/Race/<action>/<id>',
        '/races/<action:\w+>' => 'Event/Race/<action>',
        '/race/<action:\w+>/<id:\d+>' => 'Event/Race/<action>/<id>',
        '/race/<action:\w+>' => 'Event/Race/<action>',
        '/payment/payProcess/' => 'Event/LiqpayPayment/payProcess',
        '/payment/<action:\w+>' => 'Event/LiqpayPayment/<action>',
        '/payment/success' => 'Event/LiqpayPayment/success',
//        '/payment/<action:\w+>/order/<id:\d+>' => 'Event/LiqpayPayment/<action>/<id>',
    ],
];