<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 015 15.12.18
 * Time: 19:25
 *
 *
 * @var RaceRoute
 */

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
    <input name="RaceRoute[race_id]" id="RaceRegulation_event_id" type="hidden" maxlength="11" value="<?=$model->race_id?>" readonly>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'title', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('title'),
                        'data-content' => $model->getAttributeDescription('title')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
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
        <div class="col-sm-7">
            <?php
            echo CHtml::image(
                !$model->getIsNewRecord() && $model->image ? $model->getImageUrl() : '#',
                $model->title,
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
<?php $this->widget(
    'bootstrap.widgets.TbButton', [
        'buttonType' => 'submit',
        'context'    => 'primary',
//        'htmlOptions'=> ['name' => 'submit-type'],
        'htmlOptions'=> ['name' => 'submit-type', 'value' => 'save'],
        'label'      => Yii::t('EventModule.Event', 'Зберегти'),
    ]
); ?>
<?php $this->endWidget(); ?>