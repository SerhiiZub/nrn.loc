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
    'module'    => [
        'class' => 'application.modules.Event.EventModule',
    ],
    'import'    => [],
    'component' => [],
    'rules'     => [
        '/Event' => 'Event/Event/index',
        '/' => 'Event/Event/index',
        '/event/<id:\d+>' => 'Event/Event/view',
        '/race/<id:\d+>' => 'Event/Race/view',
        '/races/<id:\d+>' => 'Event/Race/view',
    ],
];