<?php
/**
 * Отображение для _form:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 *
 *   @var $model Event
 *   @var $form TbActiveForm
 *   @var $this EventBackendController
 **/
?>
<? $form = $this->beginWidget(
    '\yupe\widgets\ActiveForm',
    [
        'id' => 'post-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'type' => 'vertical',
        'htmlOptions' => ['class' => 'well', 'enctype' => 'multipart/form-data'],
    ]
);

?>

<div class="alert alert-info">
    <?=  Yii::t('EventModule.Event', 'Поля, отмеченные'); ?>
    <span class="required">*</span>
    <?=  Yii::t('EventModule.Event', 'обязательны.'); ?>
</div>

<?=  $form->errorSummary($model); ?>

    <!--<div class="row">
        <div class="col-sm-7">
            <?/*=  $form->textFieldGroup($model, 'create_user_id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('create_user_id'),
                        'data-content' => $model->getAttributeDescription('create_user_id')
                    ]
                ]
            ]); */?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?/*=  $form->textFieldGroup($model, 'update_user_id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('update_user_id'),
                        'data-content' => $model->getAttributeDescription('update_user_id')
                    ]
                ]
            ]); */?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?/*=  $form->dateTimePickerGroup($model,'create_time', [
            'widgetOptions' => [
                'options' => [],
                'htmlOptions'=>[]
            ],
            'prepend'=>'<i class="fa fa-calendar"></i>'
        ]); */?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?/*=  $form->dateTimePickerGroup($model,'update_time', [
            'widgetOptions' => [
                'options' => [],
                'htmlOptions'=>[]
            ],
            'prepend'=>'<i class="fa fa-calendar"></i>'
        ]); */?>
        </div>
    </div>-->

    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'name', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('name'),
                        'data-content' => $model->getAttributeDescription('name')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?= $form->dropDownListGroup(
                $model,
                'event_organizer',
                [
                    'widgetOptions' => [
                        'data'        => EventOrganizers::getOrganizers(),
//                        'data'        => $model->getStatusList(),
                        'htmlOptions' => [
                            'class'               => 'popover-help',
                            'data-original-title' => $model->getAttributeLabel('event_organizer'),
                            'data-content'        => $model->getAttributeDescription('event_organizer'),
                        ],
                    ],
                ]
            ); ?>
        </div>
    </div>
    <div class="row">
<!--            --><?php //$this->widget('themes.admin.ext.ckeditor.CKEditor', array(
//                'model'=>$model,
//                'attribute'=>'description',
//                'language'=>'ru',
//                'editorTemplate'=>'full',
////                "defaultValue"=> 'description'
//            )); ?>
        <div class="col-sm-12">
            <?=  $form->ckEditorGroup($model, 'description', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('description'),
                        'data-content' => $model->getAttributeDescription('description')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?=  $form->textFieldGroup($model, 'city', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('city'),
                        'data-content' => $model->getAttributeDescription('city')
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-sm-6">
            <?=  $form->textFieldGroup($model, 'address', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('address'),
                        'data-content' => $model->getAttributeDescription('address')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
                <?= $form->datePickerGroup(
                    $model,
                    'dateTimeStart',
                    [
                        'widgetOptions' => [
                            'options' => [
                                'format' => 'yyyy-mm-dd',
                                'weekStart' => 1,
                                'autoclose' => true,
                            ],
                        ],
                        'prepend' => '<i class="fa fa-calendar"></i>',
                    ]
                );
                ?>
        </div>
        <div class="col-sm-6">
            <?= $form->datePickerGroup(
                $model,
                'dateTimeEndRegistration',
                [
                    'widgetOptions' => [
                        'options' => [
                            'format' => 'yyyy-mm-dd',
                            'weekStart' => 1,
                            'autoclose' => true,
                        ],
                    ],
                    'prepend' => '<i class="fa fa-calendar"></i>',
                ]
            );
            ?>
        </div>
    </div>
    <div class='row'>
        <div class="col-sm-7">
            <?php
            echo CHtml::image(
                !$model->getIsNewRecord() && $model->image ? $model->getImageUrl() : '#',
                $model->name,
                [
                    'class' => 'preview-image img-responsive',
                    'style' => !$model->getIsNewRecord() && $model->image ? '' : 'display:none',
                ]
            ); ?>

            <?php if (!$model->getIsNewRecord() && $model->image): ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"
                               name="delete-file"> <?= Yii::t('YupeModule.yupe', 'Delete the file') ?>
                    </label>
                </div>
            <?php endif; ?>

            <?= $form->fileFieldGroup(
                $model,
                'image',
                [
                    'widgetOptions' => [
                        'htmlOptions' => [
                            'onchange' => 'readURL(this);',
                            'style' => 'background-color: inherit;',
                        ],
                    ],
                ]
            ); ?>
        </div>
<!--        <div class="col-sm-7">-->
<!--            --><?php
//            echo CHtml::image(
//                !$model->getIsNewRecord() && $model->image ? $model->getImageUrl() : '#',
//                $model->name,
//                [
//                    'class' => 'preview-image img-responsive',
//                    'style' => !$model->getIsNewRecord() && $model->image ? '' : 'display:none',
//                ]
//            ); ?>
<!---->
<!--            --><?php //if (!$model->getIsNewRecord() && $model->image): ?>
<!--                <div class="checkbox">-->
<!--                    <label>-->
<!--                        <input type="checkbox"-->
<!--                               name="delete-file"> --><?//= Yii::t('YupeModule.yupe', 'Delete the file') ?>
<!--                    </label>-->
<!--                </div>-->
<!--            --><?php //endif; ?>
<?php
//echo CHtml::activeFileField($model, 'image');
//echo $form->fileFieldGroup($model, 'image');
/*$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);
echo $form->labelEx($model, 'image');
echo $form->fileField($model, 'image');
echo $form->error($model, 'image');*/
?>
            <?/*= $form->fileFieldGroup(
                $model,
                'image',
                [
                    'widgetOptions' => [
                        'htmlOptions' => [
                            'onchange' => 'readURL(this);',
                            'style' => 'background-color: inherit;',
                        ],
                    ],
                ]
            ); */?>
<!--        </div>-->
    </div>
<!--    <div class="row">
        <div class="col-sm-7">
            <?/*=  $form->textFieldGroup($model, 'slug', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('slug'),
                        'data-content' => $model->getAttributeDescription('slug')
                    ]
                ]
            ]); */?>
        </div>
    </div>-->
<!--    <div class="row">
        <div class="col-sm-7">
            <?/*=  $form->textFieldGroup($model, 'status', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('status'),
                        'data-content' => $model->getAttributeDescription('status')
                    ]
                ]
            ]); */?>
        </div>
    </div>-->
    <div class="row">
        <div class="col-sm-4">
            <?= $form->dropDownListGroup(
                $model,
                'status',
                [
                    'widgetOptions' => [
                        'data'        => $model->getStatusList(),
                        'htmlOptions' => [
                            'class'               => 'popover-help',
                            'data-original-title' => $model->getAttributeLabel('status'),
                            'data-content'        => $model->getAttributeDescription('status'),
                        ],
                    ],
                ]
            ); ?>
        </div>
        <div class="col-sm-8"></div>
    </div>

<?php if ($model->isNewRecord):?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('EventModule.Event', 'Продовжити'),
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'next'],
        ]
    ); ?>
<?php else:?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('EventModule.Event', 'Зберегти'),
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
        ]
    ); ?>
<?php endif;?>

<?php $this->endWidget(); ?>
    <?php if (!empty($model->races)):?>
    <h4><?=Yii::t('EventModule.Event', 'додані забіги:')?></h4>
        <?php
        $this->widget(
            'yupe\widgets\CustomGridView',
            [
                'id'           => 'event-grid',
                'type'         => 'striped condensed border',
                'dataProvider' => new CArrayDataProvider($model->races),
                'actionsButtons' => [
                    CHtml::link(Yii::t('YupeModule.yupe', 'Add'), ['/admin/race/create/event/'.$model->id], ['class' => 'btn btn-success pull-right btn-sm'])
                ],
                'columns'      => [
                        'id',
                        'title',
//                        'status',
                        [
                            'class'   => 'yupe\widgets\EditableStatusColumn',
                            'name'    => 'status',
                            'url'     => $this->createUrl('/admin/races/inline'),
                            'source'  => $model->getStatusList(),
                            'options' => [
                                MyEvent::STATUS_ACTIVE   => ['class' => 'label-success'],
                                MyEvent::STATUS_DISABLED => ['class' => 'label-default'],
                                MyEvent::STATUS_ENDED => ['class' => 'label-default'],
                            ],
                        ],
                        'cost',
                        [
                            'class' => 'yupe\widgets\CustomButtonColumn',
                            'htmlOptions' => [
                                'class' => 'pull-right'
                            ],
                            'viewButtonUrl' => function ($data) {
                                                        return Yii::app()->createUrl('backend/admin/races/view/'.$data->id);
                                                    },
                            'updateButtonUrl' => function ($data) {
                                                        return Yii::app()->createUrl('backend/admin/races/update/'.$data->id);
                                                    },
                            'deleteButtonUrl' => function ($data) {
                                                        return Yii::app()->createUrl('backend/admin/races/update/'.$data->id);
                                                    },
                        ],
                ],
                'htmlOptions' => [
                        'class' => 'well'
                ]
            ]
        );
        ?>
<?php endif;?>
