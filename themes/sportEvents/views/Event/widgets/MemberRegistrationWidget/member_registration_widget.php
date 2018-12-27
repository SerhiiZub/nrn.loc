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

?>

<?php if ($model->status == Races::STATUS_ACTIVE):?>

    <?php
    $form = $this->beginWidget(
        'bootstrap.widgets.TbActiveForm', [
            'id'                     => 'event-members-form',
            'enableAjaxValidation'   => false,
            'enableClientValidation' => true,
            'action'                 => '/race/'.$model->race_id,
            'htmlOptions'            => [
    //                'action'         => '/race/MemberRegistration/'.$model->race_id,
    //                'class' => 'well'
            ],
        ]
    );
    ?>

    <!--    <div class="alert alert-info">-->
    <!--        --><?//=  Yii::t('EventModule.Event', 'Поля, отмеченные'); ?>
    <!--        <span class="required">*</span>-->
    <!--        --><?//=  Yii::t('EventModule.Event', 'обязательны.'); ?>
    <!--    </div>-->

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
            <div class="col-sm-12">
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
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
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
    <!--    </div>
        <div class="row">-->
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
        </div>
        <div class="row">
            <div class="col-sm-12">
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
                <?php
                echo CHtml::image(
                    !$model->getIsNewRecord() && $model->image ? $model->getImageUrl() : '#',
                    $model->first_name.'_'.$model->last_name,
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
    <!--    <div class="row">-->
    <!--        <div class="col-sm-7">-->
    <!--            --><?//=  $form->textFieldGroup($model, 'image', [
    //                'widgetOptions' => [
    //                    'htmlOptions' => [
    //                        'class' => 'popover-help',
    //                        'data-original-title' => $model->getAttributeLabel('image'),
    //                        'data-content' => $model->getAttributeDescription('image')
    //                    ]
    //                ]
    //            ]); ?>
    <!--        </div>-->
    <!--    </div>-->
    <?php
        echo $form->hiddenField($model, 'event_id');
        echo $form->hiddenField($model, 'race_id');
        echo $form->hiddenField($model, 'user_id');
        echo $form->hiddenField($model, 'start_number');
    //    var_dump($model);
    //    $form->hiddenField($model, 'event_id', ['value' => $this->event_id])
    ?>
    <?php if (0 && !empty($race->cost) && $race->cost != 0):?>
        <?php $this->widget(
            'bootstrap.widgets.TbButton', [
                'buttonType' => 'submit',
                'context'    => 'primary',
                'htmlOptions'=> ['name' => 'submit-type', 'value' => 'pay'],
                'label'      => Yii::t('EventModule.Event', 'Перейти до оплати'),
            ]
        ); ?>
    <?php else:?>
    <!--    --><?php //$this->widget(
    //        'bootstrap.widgets.TbButton', [
    //            'buttonType' => 'submit',
    //            'context'    => 'primary',
    //            'label'      => Yii::t('EventModule.Event', 'Сохранить Участника и продолжить'),
    //        ]
    //    ); ?>
        <?php $this->widget(
            'bootstrap.widgets.TbButton', [
                'buttonType' => 'submit',
                'context'    => 'primary',
                'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
                'label'      => ($race->cost == 0) ? Yii::t('EventModule.Event', 'Зареєструватися') : Yii::t('EventModule.Event', 'Зареєструватися і сплатити'),
            ]
        ); ?>
    <?php endif;?>

    <?php $this->endWidget(); ?>
    <?php //var_dump($race)?>
<?php else:?>
    <div class="alert alert-info" style="width: 100%; text-align: center; font-size: large"><?=Yii::t('EventModule.Event', 'Реєстрація не доступна')?></div>
<?php endif;?>