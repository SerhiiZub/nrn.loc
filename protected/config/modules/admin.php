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
        //user
        '/admin/user' => '/user/userBackend/index',
        '/admin/user/<action:\w+>' => '/user/userBackend/<action>',

        //events
        '/admin/event' => '/Event/eventBackend/index',
        '/admin/events' => '/Event/eventBackend/index',
        '/admin/event/<action:\w+>' => '/Event/EventBackend/<action>',
        '/admin/events/<action:\w+>' => '/Event/EventBackend/<action>',
        '/event/<action:\w+>' => '/Event/Event/<action>',
//        '/admin/<action:\w+>/<id:\w+>' => 'coupon/coupon/<action>',

        //races
        '/admin/races' => '/Event/racesBackend/index',
        '/admin/races/<action:\w+>' => '/Event/RacesBackend/<action>',
        '/admin/races/create/event/<id:\d+>' => '/Event/RacesBackend/create/event/<id>',

        //members
        '/admin/members' => '/Event/eventMembersBackend/index',
        '/admin/members/<action:\w+>' => '/Event/EventMembersBackend/<action>',

        //race types
        '/admin/raceType' => '/Event/RaceTypeBackend/index',
        '/admin/raceTypes' => '/Event/RaceTypeBackend/index',
        '/admin/raceTypes/<action:\w+>' => '/Event/RaceTypeBackend/<action>',
        '/admin/raceType/<id:\d+>' => '/Event/RaceTypeBackend/view/<id>',
//        '/backend/RaceAgeCategoryBackend/index' => '/Event/RacesBackend/create/event/<id>',

        //race age categories
        '/admin/raceAge' => '/Event/RaceAgeCategoryBackend/index',
        '/admin/raceAges' => '/Event/RaceAgeCategoryBackend/index',
        '/admin/raceAge/<action:\w+>' => '/Event/RaceAgeCategoryBackend/<action>',
        '/admin/raceAge/<id:\d+>' => '/Event/RaceAgeCategoryBackend/view/<id>',
    ],
];