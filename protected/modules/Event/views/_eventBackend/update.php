<?php
/**
 * Отображение для update:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('EventModule.Event', 'Мероприятия') => ['/Event/event/index'],
    $model->name => ['/Event/event/view', 'id' => $model->id],
    Yii::t('EventModule.Event', 'Редактирование'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Мероприятия - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('EventModule.Event', 'Управление Мероприятиями'), 'url' => ['/Event/event/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('EventModule.Event', 'Добавить Мероприятие'), 'url' => ['/Event/event/create']],
    ['label' => Yii::t('EventModule.Event', 'Мероприятие') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('EventModule.Event', 'Редактирование Мероприятия'), 'url' => [
        '/Event/event/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('EventModule.Event', 'Просмотреть Мероприятие'), 'url' => [
        '/Event/event/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('EventModule.Event', 'Удалить Мероприятие'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/Event/event/delete', 'id' => $model->id],
        'confirm' => Yii::t('EventModule.Event', 'Вы уверены, что хотите удалить Мероприятие?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('EventModule.Event', 'Редактирование') . ' ' . Yii::t('EventModule.Event', 'Мероприятия'); ?>        <br/>
        <small>&laquo;<?=  $model->name; ?>&raquo;</small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>