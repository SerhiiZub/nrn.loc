<?php
$this->title = Yii::t('UserModule.user', 'Sign in');
$this->breadcrumbs = [Yii::t('UserModule.user', 'Sign in')];
?>

<?php $this->widget('yupe\widgets\YFlashMessages'); ?>

<div style="background-color: #f8f8f8; padding: 20px;">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
                <?php $form = $this->beginWidget(
                    'bootstrap.widgets.TbActiveForm',
                    [
                        'id' => 'login-form',
                        'type' => 'horizontal',
                        'htmlOptions' => [
                        'style' => 'background-color: #f8f8f8;',
                        ]
                    ]
                ); ?>

                <?= $form->errorSummary($model); ?>
                <?php $form->type = TbActiveForm::TYPE_HORIZONTAL ?>
                <?= $form->textFieldGroup($model, 'email', [
                        'widgetOptions' => [
                            'htmlOptions' => [
//                                'data-original-title' => '',
                                'class' => 'form-control',
                            ]
                        ]
                    ]
                ); ?>
                <?= $form->passwordFieldGroup($model, 'password'); ?>
                <?php $form->type = TbActiveForm::TYPE_VERTICAL ?>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <?= $form->checkBoxGroup($model, 'remember_me', [
                            'widgetOptions' => [
                                'htmlOptions' => [
                                    'checked' => true
                                ]
                            ]
                        ]); ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <?php
                        $this->widget(
                            'bootstrap.widgets.TbButton',
                            [
                                'buttonType' => 'submit',
                                'context' => 'primary',
                                'icon' => 'glyphicon glyphicon-signin',
                                'label' => Yii::t('UserModule.user', 'Sign in'),
                                'htmlOptions' => ['id' => 'login-btn', 'name' => 'login-btn']
                            ]
                        ); ?>
                    </div>
                </div>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Log in with Facebook</button>
        </div>
        <div class="col-sm-9 col-sm-offset-2">
                <div class="col-sm-3"></div>
                <div class="col-sm-9" style="padding: 10px; display: flow-root; border: 1px solid #ccc; border-radius: 4px; margin-bottom: 10px;">
                    <div class="col-sm-6" style="margin-top: 6px;">Вперше на нашому сайті?</div>
                    <?= CHtml::link(Yii::t('UserModule.user', 'Sign up'), ['/user/account/registration'], ['class' => 'btn btn-default pull-right']) ?>
                </div>
                <div class="col-sm-3"></div>
                <div style="border: 1px solid #ccc; border-radius: 4px; padding: 10px; display: flow-root; margin-bottom: 10px">
                    <div class="col-sm-6" style="margin-top: 6px;">Ви забули свій пароль?</div>
                    <?= CHtml::link(Yii::t('UserModule.user', 'Відновити пароль'), ['/user/account/recovery'], ['class' => 'btn btn-default pull-right']) ?>
                </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>