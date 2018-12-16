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
    'import' => [
        'application.models.*',
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
        'class' => 'application.modules.admin.AdminModule',
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
    'component' => [],
    'rules'     => [
//        '/admin' => 'admin/admin/index',
        '/admin' => '/admin/adminBackend/index',
        '/backend/admin' => '/admin/adminBackend/index',
        '/admin/default/index' => '/admin/adminBackend/index',
        '/backend/admin/default/index' => '/admin/adminBackend/index',


        //user
        '/admin/user' => '/user/userBackend/index',
        '/backend/admin/user' => '/user/userBackend/index',
        '/admin/user/<action:\w+>' => '/user/userBackend/<action>',
        '/backend/admin/user/<action:\w+>' => '/user/userBackend/<action>',

        //events
        '/admin/event' => 'admin/myEventBackend/index',
        '/backend/admin/event' => 'admin/myEventBackend/index',
        '/admin/events' => 'admin/myEventBackend/index',
        '/backend/admin/events' => 'admin/myEventBackend/index',
        '/admin/event/<action:\w+>' => 'admin/myEventBackend/<action>',
        '/backend/admin/event/<action:\w+>' => 'admin/myEventBackend/<action>',
        '/admin/events/<action:\w+>' => 'admin/myEventBackend/<action>',
        '/backend/admin/events/<action:\w+>' => 'admin/myEventBackend/<action>',
//        '/admin/events/<action:\w+>' => '/Event/EventBackend/<action>',
//        '/admin/event/view/<id:\d+>' => '/Event/EventBackend/view/<id>',
//        '/admin/events/view/<id:\d+>' => '/Event/EventBackend/view/<id>',
        '/event/<action:\w+>' => '/Event/Event/<action>',
//        '/admin/<action:\w+>/<id:\w+>' => 'coupon/coupon/<action>',

        //races
        '/admin/races' => 'admin/racesBackend/index',
        '/backend/admin/races' => 'admin/racesBackend/index',
        '/admin/races/<action:\w+>' => 'admin/RacesBackend/<action>',
        '/backend/admin/races/<action:\w+>' => 'admin/RacesBackend/<action>',
        '/admin/races/<action:\w+>/<id:\d+>' => 'admin/RacesBackend/<action>/<id>',
//        '/backend/admin/races/<action:\w+>/<id:\d+>' => 'admin/RacesBackend/<action>/<id>',
        '/admin/races/create/event/<id:\d+>' => 'admin/RacesBackend/create/event/<id>',
        '/backend/admin/races/create/event/<id:\d+>' => 'admin/RacesBackend/create/event/<id>',
//        '/backend/admin/races/create/event/<id:\d+>' => '/Event/RacesBackend/create/event/<id>',

        //members
        '/admin/members' => '/Event/eventMembersBackend/index',
        '/backend/admin/members' => '/Event/eventMembersBackend/index',
        '/admin/members/<action:\w+>' => '/Event/EventMembersBackend/<action>',
        '/backend/admin/members/<action:\w+>' => '/Event/EventMembersBackend/<action>',

        //race types
        '/admin/raceType' => '/Event/RaceTypeBackend/index',
        '/backend/admin/raceType' => '/Event/RaceTypeBackend/index',
        '/admin/raceTypes' => '/Event/RaceTypeBackend/index',
        '/backend/admin/raceTypes' => '/Event/RaceTypeBackend/index',
        '/admin/raceTypes/<action:\w+>' => '/Event/RaceTypeBackend/<action>',
        '/backend/admin/raceTypes/<action:\w+>' => '/Event/RaceTypeBackend/<action>',
        '/admin/raceType/<id:\d+>' => '/Event/RaceTypeBackend/view/<id>',
        '/backend/admin/raceType/<id:\d+>' => '/Event/RaceTypeBackend/view/<id>',
//        '/backend/RaceAgeCategoryBackend/index' => '/Event/RacesBackend/create/event/<id>',

        //race age categories
        '/admin/raceAge' => '/Event/RaceAgeCategoryBackend/index',
        '/backend/admin/raceAge' => '/Event/RaceAgeCategoryBackend/index',
        '/admin/raceAges' => '/Event/RaceAgeCategoryBackend/index',
        '/backend/admin/raceAges' => '/Event/RaceAgeCategoryBackend/index',
        '/admin/raceAge/<action:\w+>' => '/Event/RaceAgeCategoryBackend/<action>',
        '/backend/admin/raceAge/<action:\w+>' => '/Event/RaceAgeCategoryBackend/<action>',
        '/admin/raceAge/<id:\d+>' => '/Event/RaceAgeCategoryBackend/view/<id>',
        '/backend/admin/raceAge/<id:\d+>' => '/Event/RaceAgeCategoryBackend/view/<id>',

        //organizers
        '/admin/organizers' => 'admin/EventOrganizersBackend/index',
        '/admin/organizer' => 'admin/EventOrganizersBackend/index',
        '/backend/admin/organizers' => 'admin/EventOrganizersBackend/index',
        '/admin/organizers/<action:\w+>' => 'admin/EventOrganizersBackend/<action>',
        '/backend/admin/organizers/<action:\w+>' => 'admin/EventOrganizersBackend/<action>',
        '/admin/organizers/<id:\d+>' => 'admin/EventOrganizersBackend/view/<id>',
        '/admin/organizer/<id:\d+>' => 'admin/EventOrganizersBackend/view/<id>',
        '/backend/admin/organizer/<id:\d+>' => 'admin/EventOrganizersBackend/view/<id>',
    ],
];