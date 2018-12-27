<?php
/**
 * Отображение для _search:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'action'      => Yii::app()->createUrl($this->route),
        'method'      => 'get',
        'type'        => 'vertical',
        'htmlOptions' => ['class' => 'well'],
    ]
);
?>

<fieldset>
    <div class="row">
        <div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('id'),
                        'data-content' => $model->getAttributeDescription('id')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'payment_id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('payment_id'),
                        'data-content' => $model->getAttributeDescription('payment_id')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'status', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('status'),
                        'data-content' => $model->getAttributeDescription('status')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'paytype', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('paytype'),
                        'data-content' => $model->getAttributeDescription('paytype')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
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
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'order_id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('order_id'),
                        'data-content' => $model->getAttributeDescription('order_id')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'liqpay_order_id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('liqpay_order_id'),
                        'data-content' => $model->getAttributeDescription('liqpay_order_id')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'description', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('description'),
                        'data-content' => $model->getAttributeDescription('description')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'sender_phone', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('sender_phone'),
                        'data-content' => $model->getAttributeDescription('sender_phone')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'sender_card_bank', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('sender_card_bank'),
                        'data-content' => $model->getAttributeDescription('sender_card_bank')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'sender_card_type', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('sender_card_type'),
                        'data-content' => $model->getAttributeDescription('sender_card_type')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'ip', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('ip'),
                        'data-content' => $model->getAttributeDescription('ip')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'info', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('info'),
                        'data-content' => $model->getAttributeDescription('info')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'amount', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('amount'),
                        'data-content' => $model->getAttributeDescription('amount')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'currency', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('currency'),
                        'data-content' => $model->getAttributeDescription('currency')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textFieldGroup($model, 'transaction_id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('transaction_id'),
                        'data-content' => $model->getAttributeDescription('transaction_id')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->textAreaGroup($model, 'full_data', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'rows' => 6,
                    'cols' => 50,
                    'data-original-title' => $model->getAttributeLabel('full_data'),
                    'data-content' => $model->getAttributeDescription('full_data')
                ]
            ]]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->dateTimePickerGroup($model,'create_time', [
            'widgetOptions' => [
                'options' => [],
                'htmlOptions'=>[]
            ],
            'prepend'=>'<i class="fa fa-calendar"></i>'
        ]); ?>
        </div>
		<div class="col-sm-3">
            <?=  $form->dateTimePickerGroup($model,'update_time', [
            'widgetOptions' => [
                'options' => [],
                'htmlOptions'=>[]
            ],
            'prepend'=>'<i class="fa fa-calendar"></i>'
        ]); ?>
        </div>
		    </div>
</fieldset>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'context'     => 'primary',
            'encodeLabel' => false,
            'buttonType'  => 'submit',
            'label'       => '<i class="fa fa-search">&nbsp;</i> ' . Yii::t('AdminModule.admin', 'Искать Liqpay платіж'),
        ]
    ); ?>

<?php $this->endWidget(); ?>