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
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'event-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions'            => ['class' => 'well'],
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
            <?=  $form->textFieldGroup($model, 'icon', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('icon'),
                        'data-content' => $model->getAttributeDescription('icon')
                    ]
                ]
            ]); ?>
        </div>
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

<?php $this->endWidget(); ?>