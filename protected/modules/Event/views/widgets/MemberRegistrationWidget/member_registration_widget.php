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
 *   @var $model EventMembers
 *   @var $form TbActiveForm
 *   @var $this EventMembersController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'event-members-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
//        'htmlOptions'            => ['class' => 'well'],
    ]
);
?>

    <div class="alert alert-info">
        <?=  Yii::t('EventModule.Event', 'Поля, отмеченные'); ?>
        <span class="required">*</span>
        <?=  Yii::t('EventModule.Event', 'обязательны.'); ?>
    </div>

<?=  $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-sm-7 col-md-6">
            <?=  $form->textFieldGroup($model, 'first_name', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('first_name'),
                        'data-content' => $model->getAttributeDescription('first_name')
                    ]
                ]
            ]); ?>
        </div>
<!--    </div>-->
<!--    <div class="row">-->
        <div class="col-sm-7 col-md-6">
            <?=  $form->textFieldGroup($model, 'last_name', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('last_name'),
                        'data-content' => $model->getAttributeDescription('last_name')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <!--<div class="row">
        <div class="col-sm-7">
            <?/*=  $form->textFieldGroup($model, 'midle_name', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('midle_name'),
                        'data-content' => $model->getAttributeDescription('midle_name')
                    ]
                ]
            ]); */?>
        </div>
    </div>-->
    <div class="row">
        <div class="col-sm-7 col-md-6">
            <?=  $form->emailFieldGroup($model, 'email', [
//            <?=  $form->textFieldGroup($model, 'email', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('email'),
                        'data-content' => $model->getAttributeDescription('email')
                    ]
                ]
            ]); ?>
        </div>
<!--    </div>-->
<!--    <div class="row">-->
        <div class="col-sm-7 col-md-6">
            <?=  $form->telFieldGroup($model, 'phone', [
//            <?=  $form->textFieldGroup($model, 'phone', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('phone'),
                        'data-content' => $model->getAttributeDescription('phone')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
<!--            --><?//=  $form->datePickerGroup($model,'b_date', [
//                'widgetOptions'=>[
//                    'options' => [],
//                    'htmlOptions' => []
//                ],
//                'prepend'=>'<i class="fa fa-calendar"></i>'
//            ]); ?>
            <?php $this->widget('application.modules.Event.widgets.SeparateDateWidget',[
                    'model' => $model,
                'attribute' => 'b_date',
                ]);?>
<!--            --><?php // $ts = strtotime('now');?>
<!--            --><?php //list($day, $month, $year) = array(date('j',$ts), date('n',$ts), date('Y',$ts));?>
<!--            --><?// echo CHtml::activeDropDownList($model, 'b_date', CHtml::listData($day, 'id', 'name')); ?>
<!---->
<!--            --><?// echo CHtml::activeDropDownList($model, 'b_date', CHtml::listData($month, 'id', 'name')); ?>
<!---->
<!--            --><?// echo CHtml::activeDropDownList($model, 'b_date', CHtml::listData($year, 'id', 'name')); ?>
<!--            --><?php

//            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
//                'name'=>'b_date',
//                'model'=>$model,
//                'attribute'=>'b_date',
//                'options'=>array(
//                    'showAnim'=>'fold',
//                ),
//                'htmlOptions'=>array(
//                    'style'=>'height:20px;'
//                ),
//            ));
//            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?= $form->dropDownListGroup(
                $model,
                'sex',
                [
                    'widgetOptions' => [
                        'data'        => $model->getSexList(),
                        'htmlOptions' => [
                            'class'               => 'popover-help',
                            'data-original-title' => $model->getAttributeLabel('sex'),
                            'data-content'        => $model->getAttributeDescription('sex'),
                        ],
                    ],
                ]
            ); ?>
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
            <?=  $form->textFieldGroup($model, 'alternative_contact', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('alternative_contact'),
                        'data-content' => $model->getAttributeDescription('alternative_contact')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'promo_code', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('promo_code'),
                        'data-content' => $model->getAttributeDescription('promo_code')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'image', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('image'),
                        'data-content' => $model->getAttributeDescription('image')
                    ]
                ]
            ]); ?>
        </div>
    </div>

<?php $this->widget(
    'bootstrap.widgets.TbButton', [
        'buttonType' => 'submit',
        'context'    => 'primary',
        'label'      => Yii::t('EventModule.Event', 'Сохранить Участника и продолжить'),
    ]
); ?>
<?php $this->widget(
    'bootstrap.widgets.TbButton', [
        'buttonType' => 'submit',
        'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
        'label'      => Yii::t('EventModule.Event', 'Сохранить Участника и закрыть'),
    ]
); ?>

<?php $this->endWidget(); ?>