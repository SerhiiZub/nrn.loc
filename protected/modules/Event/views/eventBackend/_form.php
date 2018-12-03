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
            <?=  $form->textAreaGroup($model, 'description', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'rows' => 6,
                    'cols' => 50,
                    'data-original-title' => $model->getAttributeLabel('description'),
                    'data-content' => $model->getAttributeDescription('description')
                ]
            ]]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
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
    </div>
    <div class="row">
        <div class="col-sm-7">
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
<!--    <div class="row">-->
<!--        <div class="col-sm-7">-->
<!--            --><?//=  $form->textFieldGroup($model, 'icon', [
//                'widgetOptions' => [
//                    'htmlOptions' => [
//                        'class' => 'popover-help',
//                        'data-original-title' => $model->getAttributeLabel('icon'),
//                        'data-content' => $model->getAttributeDescription('icon')
//                    ]
//                ]
//            ]); ?>
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--    <div class="col-sm-7">-->
<?php //$form->dateField($model,'dateTimeStart')?>
<!--    </div>-->
<!--    </div>-->
<?/*= $form->dateField($model, 'dateTimeStart')->widget(DateTimePicker::className(), [

    'options' => ['placeholder' => 'Select rendering time ...'],

    'convertFormat' => true,

    'pluginOptions' => [

        'format' => 'yyyy/dd/mm hh:ii:ss',

        'startDate' => '01-Jul-2017 12:00 AM',

        'todayHighlight' => true

    ]


]); */?>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->dateTimePickerGroup($model,'dateTimeStart', [
            'widgetOptions' => [
                'options' => [
                    'format' => 'dd-mm-yyyy hh:ii',
                    'weekStart' => 1,
                    'autoclose' => true,
                ],
                'htmlOptions'=>[
                    'class' => 'popover-help',
                    'data-original-title' => $model->getAttributeLabel('dateTimeStart'),
                    'data-content' => $model->getAttributeDescription('dateTimeStart'),
//                    'value' => date("d.m.Y"),
                ]
            ],
            'prepend'=>'<i class="fa fa-calendar"></i>'
        ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->dateTimePickerGroup($model,'dateTimeEndRegistration', [
                'widgetOptions' => [
                    'options' => [
                        'format' => 'dd-mm-yyyy hh:ii',
                        'weekStart' => 1,
                        'autoclose' => true,
                    ],
                    'htmlOptions'=>[
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('dateTimeEndRegistration'),
                        'data-content' => $model->getAttributeDescription('dateTimeEndRegistration'),
                    ]
                ],
                'prepend'=>'<i class="fa fa-calendar"></i>'
            ]); ?>
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

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('EventModule.Event', 'Сохранить Мероприятие и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('EventModule.Event', 'Сохранить Мероприятие и закрыть'),
        ]
    ); ?>
    <a href="<?php echo Yii::app()->createUrl('/admin/races/create', ['event' => $model->id])?>">Создать забег для: <?= $model->id?></a>

<?php $this->endWidget(); ?>