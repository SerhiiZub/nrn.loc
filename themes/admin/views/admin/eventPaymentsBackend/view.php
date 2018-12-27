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
    Yii::t('AdminModule.admin', 'Liqpay платежі') => ['/admin/eventPaymentsBackend/index'],
    $model->id,
];

$this->pageTitle = Yii::t('AdminModule.admin', 'Liqpay платежі - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('AdminModule.admin', 'Управление Liqpay платежами'), 'url' => ['/admin/eventPaymentsBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('AdminModule.admin', 'Добавить Liqpay платіж'), 'url' => ['/admin/eventPaymentsBackend/create']],
    ['label' => Yii::t('AdminModule.admin', 'Liqpay платіж') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('AdminModule.admin', 'Редактирование Liqpay платежу'), 'url' => [
        '/admin/eventPaymentsBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('AdminModule.admin', 'Просмотреть Liqpay платіж'), 'url' => [
        '/admin/eventPaymentsBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('AdminModule.admin', 'Удалить Liqpay платіж'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/admin/eventPaymentsBackend/delete', 'id' => $model->id],
        'confirm' => Yii::t('AdminModule.admin', 'Вы уверены, что хотите удалить Liqpay платіж?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('AdminModule.admin', 'Просмотр') . ' ' . Yii::t('AdminModule.admin', 'Liqpay платежу'); ?>        <br/>
        <small>&laquo;<?=  $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'payment_id',
        'status',
        'paytype',
        'public_key',
        'order_id',
        'liqpay_order_id',
        'description',
        'sender_phone',
        'sender_card_bank',
        'sender_card_type',
        'ip',
        'info',
        'amount',
        'currency',
        'transaction_id',
        'full_data',
        'create_time',
        'update_time',
    ],
]); ?>
