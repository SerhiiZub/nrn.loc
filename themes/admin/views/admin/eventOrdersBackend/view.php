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
    Yii::t('AdminModule.admin', 'Оплати учасника') => ['/admin/eventOrdersBackend/index'],
    $model->id,
];

$this->pageTitle = Yii::t('AdminModule.admin', 'Оплати учасника - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('AdminModule.admin', 'Управление Оплатами учасника'), 'url' => ['/admin/eventOrdersBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('AdminModule.admin', 'Добавить Оплати учасника'), 'url' => ['/admin/eventOrdersBackend/create']],
    ['label' => Yii::t('AdminModule.admin', 'Оплата учасника') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('AdminModule.admin', 'Редактирование Оплати учасника'), 'url' => [
        '/admin/eventOrdersBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('AdminModule.admin', 'Просмотреть Оплати учасника'), 'url' => [
        '/admin/eventOrdersBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('AdminModule.admin', 'Удалить Оплати учасника'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/admin/eventOrdersBackend/delete', 'id' => $model->id],
        'confirm' => Yii::t('AdminModule.admin', 'Вы уверены, что хотите удалить Оплати учасника?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('AdminModule.admin', 'Просмотр') . ' ' . Yii::t('AdminModule.admin', 'Оплати учасника'); ?>        <br/>
        <small>&laquo;<?=  $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'event_id',
        'race_id',
        'organizer_id',
        'event_member_id',
        'user_id',
        'amount',
        'promo_code',
        'payment_status',
        'payment_id',
        'create_user_id',
        'update_user_id',
        'create_time',
        'update_time',
    ],
]); ?>
