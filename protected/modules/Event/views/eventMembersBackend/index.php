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
    Yii::t('EventModule.Event', 'Участники') => ['/Event/eventMembers/index'],
    Yii::t('EventModule.Event', 'Управление'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Участники - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('EventModule.Event', 'Управление Участниками'), 'url' => ['/Event/eventMembers/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('EventModule.Event', 'Добавить Участника'), 'url' => ['/Event/eventMembers/create']],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('EventModule.Event', 'Участники'); ?>
        <small><?=  Yii::t('EventModule.Event', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?=  Yii::t('EventModule.Event', 'Поиск Участников');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('event-members-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?=  Yii::t('EventModule.Event', 'В данном разделе представлены средства управления Участниками'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'event-members-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'event_id',
            'race_id',
            'first_name',
            'last_name',
            'midle_name',
//            'email',
//            'phone',
//            'b_date',
//            'sex',
//            'city',
//            'alternative_contact',
//            'status',
//            'promo_code',
//            'create_user_id',
//            'update_user_id',
//            'create_time',
//            'update_time',
//            'image',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
