<?php
/* @var $this EventOrganizersBackendController */
/* @var $model EventOrganizers */
/* @var $form CActiveForm */

/**
 * @var TbActiveForm $form
 */
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'races-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions'            => ['class' => 'well', 'enctype' => 'multipart/form-data'],
    ]
);
?>

<div class="alert alert-info">
    <?=  Yii::t('EventModule.Event', 'Поля, отмеченные'); ?>
    <span class="required">*</span>
    <?=  Yii::t('EventModule.Event', 'обязательны.'); ?>
</div>

<?=  $form->errorSummary($model); ?>

<!--<div class="form">-->

<?php //$form=$this->beginWidget('CActiveForm', array(
//	'id'=>'event-organizers-form',
//	// Please note: When you enable ajax validation, make sure the corresponding
//	// controller action is handling ajax validation correctly.
//	// There is a call to performAjaxValidation() commented in generated controller code.
//	// See class documentation of CActiveForm for details on this.
//	'enableAjaxValidation'=>false,
//)); ?>

<!--	<p class="note">Fields with <span class="required">*</span> are required.</p>-->
<!---->
<!--	--><?php //echo $form->errorSummary($model); ?>

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'name'); ?>
<!--		--><?php //echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
<!--		--><?php //echo $form->error($model,'name'); ?>
<!--	</div>-->
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

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'description'); ?>
<!--		--><?php //echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
<!--		--><?php //echo $form->error($model,'description'); ?>
<!--	</div>-->
<div class="row">
    <?php $this->widget('themes.admin.ext.ckeditor.CKEditor', array(
        'model'=>$model,
        'attribute'=>'description',
        'language'=>'ru',
        'editorTemplate'=>'full',
    )); ?>
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
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'city'); ?>
<!--		--><?php //echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100)); ?>
<!--		--><?php //echo $form->error($model,'city'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'address'); ?>
<!--		--><?php //echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
<!--		--><?php //echo $form->error($model,'address'); ?>
<!--	</div>-->
<div class="row">
    <div class="col-sm-6">
        <?=  $form->textFieldGroup($model, 'phone', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'data-original-title' => $model->getAttributeLabel('phone'),
                    'data-content' => $model->getAttributeDescription('phone')
                ]
            ]
        ]); ?>
    </div>
    <div class="col-sm-6">
        <?=  $form->emailFieldGroup($model, 'email', [
//        <?=  $form->textFieldGroup($model, 'address', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'data-original-title' => $model->getAttributeLabel('email'),
                    'data-content' => $model->getAttributeDescription('email')
                ]
            ]
        ]); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <?=  $form->textFieldGroup($model, 'public_key', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'data-original-title' => $model->getAttributeLabel('public_key'),
                    'data-content' => $model->getAttributeDescription('public_key')
                ]
            ]
        ]); ?>
    </div>
    <div class="col-sm-6">
        <?=  $form->textFieldGroup($model, 'private_key', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'data-original-title' => $model->getAttributeLabel('private_key'),
                    'data-content' => $model->getAttributeDescription('private_key')
                ]
            ]
        ]); ?>
    </div>
</div>
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'phone'); ?>
<!--		--><?php //echo $form->textField($model,'phone'); ?>
<!--		--><?php //echo $form->error($model,'phone'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'email'); ?>
<!--		--><?php //echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
<!--		--><?php //echo $form->error($model,'email'); ?>
<!--	</div>-->

<div class="row">
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
</div>

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'public_key'); ?>
<!--		--><?php //echo $form->textField($model,'public_key',array('size'=>20,'maxlength'=>20)); ?>
<!--		--><?php //echo $form->error($model,'public_key'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'private_key'); ?>
<!--		--><?php //echo $form->textField($model,'private_key',array('size'=>50,'maxlength'=>50)); ?>
<!--		--><?php //echo $form->error($model,'private_key'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'create_user_id'); ?>
<!--		--><?php //echo $form->textField($model,'create_user_id',array('size'=>11,'maxlength'=>11)); ?>
<!--		--><?php //echo $form->error($model,'create_user_id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'update_user_id'); ?>
<!--		--><?php //echo $form->textField($model,'update_user_id',array('size'=>11,'maxlength'=>11)); ?>
<!--		--><?php //echo $form->error($model,'update_user_id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'create_time'); ?>
<!--		--><?php //echo $form->textField($model,'create_time'); ?>
<!--		--><?php //echo $form->error($model,'create_time'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'update_time'); ?>
<!--		--><?php //echo $form->textField($model,'update_time'); ?>
<!--		--><?php //echo $form->error($model,'update_time'); ?>
<!--	</div>-->

<!--	<div class="row buttons">-->
<!--		--><?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
<!--	</div>-->
<?php $this->widget(
    'bootstrap.widgets.TbButton', [
        'buttonType' => 'submit',
        'context'    => 'primary',
        'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
        'label'      => Yii::t('EventModule.Event', 'Зберегти'),
    ]
); ?>

<?php $this->endWidget(); ?>

</div>
<!-- form -->