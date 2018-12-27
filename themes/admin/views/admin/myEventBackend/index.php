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
    Yii::t('EventModule.Event', 'Спортивні заходи') => ['/Event/event/index'],
    Yii::t('EventModule.Event', 'Керування'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Мероприятия - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('EventModule.Event', 'Керування спортивними заходамми'), 'url' => ['/Event/event/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('EventModule.Event', 'Додати спортивний захід'), 'url' => ['admin/event/create']],
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
        <?=  Yii::t('EventModule.Event', 'Пошук спортивних заходів');?>
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
    <?=  Yii::t('EventModule.Event', 'В даному розділі представлені засоби керування спортивними заходами'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'event-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'actionsButtons' => [
                CHtml::link(Yii::t('EventModule.Event', 'Додати'), ['/admin/event/create'], ['class' => 'btn btn-success pull-right btn-sm'])
        ],
        'columns'      => [
            'id',
            'name',
//            [
//                'name'     => 'description',
//                'value'    => function($data){
//                    echo $data->description;
//                },
//            ],
//            'status',
            [
                'class'   => 'yupe\widgets\EditableStatusColumn',
                'name'    => 'status',
                'url'     => $this->createUrl('/admin/events/inline'),
                'source'  => $model->getStatusList(),
                'options' => [
                    MyEvent::STATUS_ACTIVE   => ['class' => 'label-success'],
                    MyEvent::STATUS_DISABLED => ['class' => 'label-default'],
                    MyEvent::STATUS_ENDED => ['class' => 'label-default'],
                ],
            ],
            [
                'class'    => 'bootstrap.widgets.TbEditableColumn',
                'name'     => 'dateTimeStart',
                'editable' => [
                    'url'        => $this->createUrl('/admin/events/inline'),
                    'type'       => 'datetime',
                    'options'    => [
                        'datetimepicker' => [
                            'format'   => 'dd-mm-yyyy hh:ii',
                            'language' => Yii::app()->language,
                        ],
//                        'datepicker'     => [
//                            'format' => 'dd-mm-yyyy',
//                        ],

                    ],
                    'viewformat' => 'dd-mm-yyyy hh:ii',
                    'params'     => [
                        Yii::app()->getRequest()->csrfTokenName => Yii::app()->getRequest()->csrfToken
                    ]
                ],
                'value'    => function($data){
                    return $data->dateTimeStart;
                },
                'filter'   => CHtml::activeTextField($model, 'dateTimeStart', ['class' => 'form-control']),
            ],
            [
                'class'    => 'bootstrap.widgets.TbEditableColumn',
                'name'     => 'dateTimeEndRegistration',
                'editable' => [
                    'url'        => $this->createUrl('/admin/events/inline'),
                    'type'       => 'datetime',
                    'options'    => [
                        'datetimepicker' => [
                            'format'   => 'dd-mm-yyyy hh:ii',
                            'language' => Yii::app()->language,
                        ],
//                        'datepicker'     => [
//                            'format' => 'dd-mm-yyyy',
//                        ],

                    ],
                    'viewformat' => 'dd-mm-yyyy hh:ii',
                    'params'     => [
                        Yii::app()->getRequest()->csrfTokenName => Yii::app()->getRequest()->csrfToken
                    ]
                ],
                'value'    => function($data){
                    return $data->dateTimeEndRegistration;
                },
                'filter'   => CHtml::activeTextField($model, 'dateTimeEndRegistration', ['class' => 'form-control']),
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
