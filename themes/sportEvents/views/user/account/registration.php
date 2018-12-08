<?php
$this->title = Yii::t('UserModule.user', 'Sign up');
$this->breadcrumbs = [Yii::t('UserModule.user', 'Sign up')];
?>

<?php $this->widget('yupe\widgets\YFlashMessages'); ?>
<div style="background-color: #f8f8f8; padding: 20px;">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class='row'>
            <div class="col-sm-4 col-sm-offset-4">
                <button type="submit" class="btn btn-primary">Log in with Facebook</button>
            </div>
            </div>
            <?php $form = $this->beginWidget(
                'bootstrap.widgets.TbActiveForm',
                [
                    'id' => 'registration-form',
                    'type' => 'vertical',
                    'htmlOptions' => [
                        'enctype' => 'multipart/form-data'
//                        'class' => 'well',
                    ]
                ]
            ); ?>

            <?= $form->errorSummary($model); ?>

            <div class='row'>
                <div class="col-sm-6">
                    <?= $form->textFieldGroup($model, 'first_name'); ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->textFieldGroup($model, 'last_name'); ?>
                </div>
            </div>
            <div class='row'>
                <div class="col-sm-6">
                    <?= $form->textFieldGroup($model, 'email'); ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->textFieldGroup($model, 'phone'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php $this->widget('application.modules.Event.widgets.SeparateDateWidget',[
                        'model' => $model,
                        'attribute' => 'birthday']
                    );?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->textFieldGroup($model, 'country', [
                        'widgetOptions' => [
                            'htmlOptions' => [
                                    'value' => Yii::t('UserModule.user', 'Україна')
                            ],
                            ]
                    ]);?>

                </div>
                <div class="col-sm-6">
                    <?= $form->textFieldGroup($model, 'city');?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->dropDownListGroup(
                        $model,
                        'gender',
                        [
                            'widgetOptions' => [
                                'data'        => $model->getGenderList(),
                                'htmlOptions' => [
                                    'class'               => 'popover-help',
                                    'data-original-title' => $model->getAttributeLabel('gender'),
                                    'data-content'        => $model->getAttributeDescription('gender'),
                                ],
                            ],
                        ]
                    ); ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->dropDownListGroup(
                        $model,
                        't_shirt_size',
                        [
                            'widgetOptions' => [
                                'data'        => array_merge([''], $model->getTShirtSizeList()),
                                'htmlOptions' => [
                                    'class'               => 'popover-help',
                                    'data-original-title' => $model->getAttributeLabel('t_shirt_size'),
                                    'data-content'        => $model->getAttributeDescription('t_shirt_size'),
                                    'selected' => 'L'
                                ],
                            ],
                        ]
                    ); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->textFieldGroup($model, 'club');?>
                </div>
                <div class="col-sm-6">
                    <?= $form->textFieldGroup($model, 'team');?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?= $form->textFieldGroup($model, 'alternative_contact'); ?>
                </div>
            </div>
            <div class="row">
            <div class="row">
                <div class="col-sm-12">
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
            <div class="row">
                <div class="col-xs-12">
                    <?php $this->widget(
                        'bootstrap.widgets.TbButton',
                        [
                            'buttonType' => 'submit',
                            'context' => 'primary',
                            'label' => Yii::t('UserModule.user', 'Sign up'),
                        ]
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
