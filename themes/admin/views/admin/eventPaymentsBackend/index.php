<?php
/**
 * Отображение для index:
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
    Yii::t('AdminModule.admin', 'Управление'),
];

$this->pageTitle = Yii::t('AdminModule.admin', 'Liqpay платежі - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('AdminModule.admin', 'Управление Liqpay платежами'), 'url' => ['/admin/eventPaymentsBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('AdminModule.admin', 'Добавить Liqpay платіж'), 'url' => ['/admin/eventPaymentsBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('AdminModule.admin', 'Liqpay платежі'); ?>
        <small><?=  Yii::t('AdminModule.admin', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?=  Yii::t('AdminModule.admin', 'Поиск Liqpay платежів');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('event-payments-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?=  Yii::t('AdminModule.admin', 'В данном разделе представлены средства управления Liqpay платежами'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'event-payments-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'payment_id',
            'status',
            'paytype',
            'public_key',
            'order_id',
//            'liqpay_order_id',
//            'description',
//            'sender_phone',
//            'sender_card_bank',
//            'sender_card_type',
//            'ip',
//            'info',
//            'amount',
//            'currency',
//            'transaction_id',
//            'full_data',
//            'create_time',
//            'update_time',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
