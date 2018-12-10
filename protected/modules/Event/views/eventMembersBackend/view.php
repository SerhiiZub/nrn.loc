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
    Yii::t('EventModule.Event', 'Участники') => ['/Event/eventMembers/index'],
    $model->id,
];

$this->pageTitle = Yii::t('EventModule.Event', 'Участники - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('EventModule.Event', 'Управление Участниками'), 'url' => ['/Event/eventMembers/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('EventModule.Event', 'Добавить Участника'), 'url' => ['/Event/eventMembers/create']],
    ['label' => Yii::t('EventModule.Event', 'Участник') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('EventModule.Event', 'Редактирование Участника'), 'url' => [
        '/Event/eventMembers/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('EventModule.Event', 'Просмотреть Участника'), 'url' => [
        '/Event/eventMembers/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('EventModule.Event', 'Удалить Участника'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/Event/eventMembers/delete', 'id' => $model->id],
        'confirm' => Yii::t('EventModule.Event', 'Вы уверены, что хотите удалить Участника?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('EventModule.Event', 'Просмотр') . ' ' . Yii::t('EventModule.Event', 'Участника'); ?>        <br/>
        <small>&laquo;<?=  $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'event_id',
        'race_id',
        'first_name',
        'last_name',
        'midle_name',
        'email',
        'phone',
        'b_date',
        'sex',
        'city',
        'alternative_contact',
        'status',
        'promo_code',
        'create_user_id',
        'update_user_id',
        'create_time',
        'update_time',
        'image',
    ],
]); ?>
