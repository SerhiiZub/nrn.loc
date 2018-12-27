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
    Yii::t('AdminModule.admin', 'Оплати учасника') => ['/admin/eventOrdersBackend/index'],
    Yii::t('AdminModule.admin', 'Управление'),
];

$this->pageTitle = Yii::t('AdminModule.admin', 'Оплати учасника - управление');

//$this->menu = [
//    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('AdminModule.admin', 'Управление Оплатами учасника'), 'url' => ['/admin/eventOrdersBackend/index']],
//    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('AdminModule.admin', 'Добавить Оплати учасника'), 'url' => ['/admin/eventOrdersBackend/create']],
//];
//?>
<div class="page-header">
    <h1>
        <?=  Yii::t('AdminModule.admin', 'Оплати учасника'); ?>
        <small><?=  Yii::t('AdminModule.admin', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?=  Yii::t('AdminModule.admin', 'Поиск Оплат учасника');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('event-orders-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?=  Yii::t('AdminModule.admin', 'В данном разделе представлены средства управления Оплатами учасника'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'actionsButtons' => [],
        'id'           => 'event-orders-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'event_member_id',
            [
                'name'    => 'event_id',
                'value'    => function($data){
                    $event = MyEvent::model()->findByPk($data->event_id);
                    return !empty($event->name) ? $event->name : '';
                },
            ],
//            'race_id',
            [
                'name'    => 'event_id',
                'value'    => function($data){
                    $event = Races::model()->findByPk($data->race_id);
                    return !empty($event->title) ? $event->title : '';
                },
            ],
            [
                'name'    => 'organizer_id',
                'value'    => function($data){
                    $event = EventOrganizers::model()->findByPk($data->organizer_id);
                    return !empty($event->name) ? $event->name : '';
                },
            ],
//            'organizer_id',
//            'user_id',
            'amount',
//            'promo_code',
            'payment_status',
//            'payment_id',
//            'create_user_id',
//            'update_user_id',
//            'create_time',
//            'update_time',
//            [
//                'class' => 'yupe\widgets\CustomButtonColumn',
//            ],
        ],
    ]
); ?>
