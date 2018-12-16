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
 *   @var $model Races
 *   @var $form TbActiveForm
 *   @var RacesBackendController $this
 *   @var MyEvent $event
 **/
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

    <div class="row">
        <?php if ($model->event_id) :?>
<!--            <input class="popover-help form-control" type="text" value="--><?//=$model->event_id?><!--" readonly = "readonly">-->
            <div class="col-sm-7">
                <?php if (!empty($model->event)):?>
                    <div class="form-group">
                        <label class="control-label required" for="Races_event_id"><?=Yii::t('EventModule.Event', 'Спортивний захід')?>,<span class="required">*</span></label>
                        <input
                                class="popover-help form-control"
                                data-original-title="Event"
                                data-content=""
                                placeholder="Event"
                                name="event_name"
                                id="Races_event_name"
                                type="text"
                                maxlength="11"
                                value="<?=$model->event->name?>"
                                readonly
                        >
                    </div>
                <?php else:?>
                <div class="form-group">
                    <label class="control-label required" for="Races_event_id">Event <span class="required">*</span></label>
                    <input
                            class="popover-help form-control"
                            data-original-title="Event"
                            data-content=""
                            placeholder="Event"
                            name="Races[event_name]"
                            id="Races_event_name"
                            type="text"
                            maxlength="11"
                            value="<?=$event->name?>"
                            readonly
                    >
                    <input
                            class="popover-help form-control"
                            data-original-title="Event"
                            data-content=""
                            placeholder="Event"
                            name="Races[event_id]"
                            id="Races_event_id"
                            type="hidden"
                            maxlength="11"
                            value="<?=$model->event_id?>"
                            readonly
                    >
                        <div class="help-block error" id="Races_event_id_em_" style="display:none">
                        </div>
                </div>
                <?php endif;?>
            </div>
        <?php else:?>
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'event_id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('event_id'),
                        'data-content' => $model->getAttributeDescription('event_id')
                    ]
                ]
            ]); ?>
        </div>
        <?php endif;?>
        <!--<div class="fast-order__inputs">
            <?/*= $form->labelEx($model, 'event_id'); */?>
            <?/*= $form->dropDownList($model, 'event_id', User::model()->getGendersList(), [
                'data-original-title' => $model->getAttributeLabel('gender'),
                'data-content' => User::model()->getAttributeDescription('gender'),
                'class' => 'input input_big'
            ]); */?>
        </div>-->
    </div>
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
        <div class="col-sm-6">
            <?=  $form->numberFieldGroup($model, 'start_number_prefix', [
//            <?=  $form->textFieldGroup($model, 'start_number_prefix', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('start_number_prefix'),
                        'data-content' => $model->getAttributeDescription('start_number_prefix')
                    ]
                ]
            ]); ?>
        </div>
        <div class="col-sm-6">
            <?=  $form->textFieldGroup($model, 'cost', [
//            <?=  $form->textFieldGroup($model, 'start_number_prefix', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('cost'),
                        'data-content' => $model->getAttributeDescription('cost')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
<!--        <div class="col-sm-7">
            <?/*=  $form->textAreaGroup($model, 'description', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'rows' => 6,
                    'cols' => 50,
                    'data-original-title' => $model->getAttributeLabel('description'),
                    'data-content' => $model->getAttributeDescription('description')
                ]
            ]]); */?>
        </div>-->
        <?php $this->widget('themes.admin.ext.ckeditor.CKEditor', array(
            'model'=>$model,
            'attribute'=>'description',
            'language'=>'ru',
            'editorTemplate'=>'full',
        )); ?>
    </div>
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
        <div class="col-sm-4">
            <?= $form->dropDownListGroup(
                $model,
                'type_Id',
                [
                    'widgetOptions' => [
                        'data'        => RaceType::getTypes(),
                        'htmlOptions' => [
                            'class'               => 'popover-help',
                            'data-original-title' => $model->getAttributeLabel('type_Id'),
                            'data-content'        => $model->getAttributeDescription('type_Id'),
                        ],
                    ],
                ]
            ); ?>
        </div>
        <div class="col-sm-4">
            <?= $form->dropDownListGroup(
                $model,
                'age_category_id',
                [
                    'widgetOptions' => [
                        'data'        => RaceAgeCategory::getCategories(),
                        'htmlOptions' => [
                            'class'               => 'popover-help',
                            'data-original-title' => $model->getAttributeLabel('age_category_id'),
                            'data-content'        => $model->getAttributeDescription('age_category_id'),
                        ],
                    ],
                ]
            ); ?>
        </div>
    </div>
<!--    <div class="row">-->
<!--        <div class="col-sm-7">-->
<!--            --><?//= $form->labelEx($model, 'age_category_id'); ?>
<!--            --><?//= $form->dropDownList($model, 'age_category_id', RaceAgeCategory::getCategories(), [
//                'class' => 'input input_big'
//            ]); ?>
<!--        </div>-->
<!--    </div>-->
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
    <hr>
    <div class="row">
        <?php if (!$model->isNewRecord):?>
            <?php $this->widget(
                'bootstrap.widgets.TbButton', [
                    'buttonType' => 'submit',
    //                'context'    => 'primary',
                    'htmlOptions'=> ['name' => 'submit-type', 'value' => 'regulation'],
//                    'htmlOptions'=> ['name' => 'submit-type', 'value' => '/backend/admin/race/regulation/3'],
                    'label'      => Yii::t('EventModule.Event', 'Регламент'),
                ]
            ); ?>
            <?php $this->widget(
                'bootstrap.widgets.TbButton', [
                    'buttonType' => 'submit',
    //                'context'    => 'primary',
                    'htmlOptions'=> ['name' => 'submit-type', 'value' => 'route'],
                    'label'      => Yii::t('EventModule.Event', 'Маршрут'),
                ]
            ); ?>
        <?php endif;?>
    </div>
    <hr>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'add'],
            'label'      => Yii::t('EventModule.Event', 'Новий Забіг'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('EventModule.Event', 'Зберегти і закінчити'),
        ]
    ); ?>

<?php $this->endWidget(); ?>