<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 015 15.12.18
 * Time: 17:02
 *
 * @var RaceRegulation $model
 */


$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('EventModule.Event', 'Мероприятия') => [(!empty($event_id) ? '/admin/event/update/'.$event_id : 'admin/event/create')],
    Yii::t('EventModule.Event', 'Добавление Забега'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Регламент - редагування');

$this->renderPartial('_form_regulation', ['model' => $model]);
