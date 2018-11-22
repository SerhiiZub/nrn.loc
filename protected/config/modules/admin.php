<?php
/**
 * Файл настроек для модуля admin
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2018 amyLabs && Yupe! team
 * @package yupe.modules.admin.install
 * @since 0.1
 *
 */
return [
    'module'    => [
        'class' => 'application.modules.admin.AdminModule',
    ],
    'import'    => [],
    'component' => [],
    'rules'     => [
//        '/admin' => 'admin/admin/index',
        '/admin' => '/admin/adminBackend/index',
        '/admin/default/index' => '/admin/adminBackend/index',
        '/admin/user' => '/user/userBackend/index',
        '/admin/user/<action:\w+>' => '/user/userBackend/<action>',
//        '/admin/<action:\w+>/<id:\w+>' => 'coupon/coupon/<action>',
    ],
];