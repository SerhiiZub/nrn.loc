<?php
/**
 * Отображение для view:
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
    $model->name,
];

$this->pageTitle = Yii::t('EventModule.Event', 'Мероприятия - просмотр');

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
        <?=  Yii::t('EventModule.Event', 'Просмотр') . ' ' . Yii::t('EventModule.Event', 'Мероприятия'); ?>        <br/>
        <small>&laquo;<?=  $model->name; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'create_user_id',
        'update_user_id',
        'create_time',
        'update_time',
        'image',
        'name',
        'description',
        'icon',
        'slug',
        'status',
    ],
]); ?>

<?php //var_dump($model->races)?>
