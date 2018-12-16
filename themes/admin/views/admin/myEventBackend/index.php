<?php
/**
 * Отображение для index:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 *
 * @var MyEvent $model
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('EventModule.Event', 'Мероприятия') => ['/Event/event/index'],
    Yii::t('EventModule.Event', 'Управление'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Мероприятия - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('EventModule.Event', 'Управление Мероприятиями'), 'url' => ['/Event/event/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('EventModule.Event', 'Добавить Мероприятие'), 'url' => ['admin/event/create']],
//    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('EventModule.Event', 'Добавить Мероприятие'), 'url' => ['/Event/event/create']],
];
?>
<!--<div class="page-header">-->
<!--    <h1>-->
<!--        --><?//=  Yii::t('EventModule.Event', 'Мероприятия'); ?>
<!--        <small>--><?//=  Yii::t('EventModule.Event', 'управление'); ?><!--</small>-->
<!--    </h1>-->
<!--</div>-->

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?=  Yii::t('EventModule.Event', 'Поиск Мероприятий');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('event-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p>
    <?=  Yii::t('EventModule.Event', 'В данном разделе представлены средства управления Мероприятиями'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'event-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
//        'filter'       => $model,
        'actionsButtons' => [
                CHtml::link(Yii::t('YupeModule.yupe', 'Add'), ['/admin/event/create'], ['class' => 'btn btn-success pull-right btn-sm'])
        ],
        'columns'      => [
            'id',
            'name',
            [
                'name'     => 'description',
                'value'    => function($data){
                    echo $data->description;
//                    echo htmlspecialchars_decode($data->description);
                },
            ],
//            'description',
//            'create_user_id',
//            'update_user_id',
//            'create_time',
//            'update_time',
            'status',
            [
                'class'    => 'bootstrap.widgets.TbEditableColumn',
                'name'     => 'update_time',
                'editable' => [
//                    'url'        => $this->createUrl('/blog/postBackend/inline'),
                    'type'       => 'datetime',
                    'options'    => [
                        'datetimepicker' => [
                            'format'   => 'dd-mm-yyyy hh:ii',
                            'language' => Yii::app()->language,
                        ],
                        'datepicker'     => [
                            'format' => 'dd-mm-yyyy',
                        ],

                    ],
                    'viewformat' => 'dd-mm-yyyy hh:ii',
                    'params'     => [
                        Yii::app()->getRequest()->csrfTokenName => Yii::app()->getRequest()->csrfToken
                    ]
                ],
                'value'    => function($data){
                    return $data->update_time;
                },
                'filter'   => CHtml::activeTextField($model, 'update_time', ['class' => 'form-control']),
            ],
//            'image',

//            'icon',
//            'slug',
//            'status',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
////                [
//                    'viewButtonIcon' => 'eye-open',
//                    'frontViewButtonUrl' => function ($data) {
//                        return Yii::app()->createUrl('/admin/event/view/'.$data->id);
//                    },
////                ]

            ],
        ],
    ]
); ?>
