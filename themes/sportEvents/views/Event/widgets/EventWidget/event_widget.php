<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 025 25.11.18
 * Time: 17:11
 *
 * @var MyEvent[] $models
 */
?>

<div class="form-row event-filters" style="padding: 0; display: -webkit-inline-box; width: 100%;">
<?php
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'action'      => '/',
//        'action'      => Yii::app()->createUrl($this->route),
        'method'      => 'get',
//        'type'        => 'horizontal',
//        'type'        => 'vertical',
        'htmlOptions' => [
            'style' => 'width: 100%;'
//                'class' => 'form-inline'
//                'class' => 'well'
        ],
    ]
);
?>

<!--<div class="form-row event-filters">-->
<!--<div class="row event-filters">-->
<!--    Фильтры-->
    <div class="col-sm-3 filter-item">
<!--    <div class="col-sm-3 form-group">-->
        <input type="text" class="form-control" name="EventFilter[city]" placeholder="<?=Yii::t('EventModule.events', 'Місто')?>" value="<?=$filters['city']?>">
    </div>
    <div class="col-sm-3 filter-item">
<!--    <div class="col-sm-3 form-group">-->
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$event,
            'attribute'=>'dateTimeStart',
//            'value'=>$model->deadline,
            //additional javascript options for the date picker plugin
            'options'=>array(
                'dateFormat'=>'yy-mm-dd',
                'showAnim'=>'fold',
                'debug'=>true,
                'datepickerOptions'=>array('changeMonth'=>true, 'changeYear'=>true),
            ),
            'htmlOptions'=>array(
                'class' => 'form-control',
                'name' => 'EventFilter[date_from]',
                'placeholder' => Yii::t('EventModule.events', 'Дата від'),
                'value' => $filters['date_from'],
                'autocomplete' => 'off',
            ),
        ));
        ?>
    </div>
    <div class="col-sm-3 filter-item">
<!--    <div class="col-sm-3 form-group">-->
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$event,
            'attribute'=>'dateTimeStart',
//            'value'=>$model->deadline,
            //additional javascript options for the date picker plugin
            'options'=>array(
                'dateFormat'=>'yy-mm-dd',
                'showAnim'=>'fold',
                'debug'=>true,
                'datepickerOptions'=>array('changeMonth'=>true, 'changeYear'=>true),
            ),
            'htmlOptions'=>array(
                'class' => 'form-control',
                'name' => 'EventFilter[date_to]',
                'placeholder' => Yii::t('EventModule.events', 'Дата до'),
                'value' => $filters['date_to'],
                'autocomplete' => 'off'
//                    'style'=>'height:20px;'
            ),
        ));
        ?>
    </div>
<!--    <div class="col-sm-2 form-group">-->
<!--        <input type="text" class="form-control" placeholder="--><?//=Yii::t('EventModule.events', 'Вид спорту')?><!--">-->
<!--    </div>-->
    <div class="col-sm-1 filter-item filter-clear">
<!--    <div class="col-sm-3 form-group">-->
<!--        --><?php //$this->widget(
//            'bootstrap.widgets.TbButton', [
//                'context'     => 'default',
//                'encodeLabel' => false,
//                'buttonType'  => 'submit',
//                'label'       => '<i class="fa fa-times">&nbsp;</i>',
//            ]
//        ); ?>
<!--        <button class="btn btn-default">--><?//=Yii::t('EventModule.events', 'Підібрати')?><!--</button>-->
    </div>
    <div class="col-sm-2 filter-item">
<!--    <div class="col-sm-3 form-group">-->
        <?php $this->widget(
            'bootstrap.widgets.TbButton', [
                'context'     => 'primary',
                'encodeLabel' => false,
                'buttonType'  => 'submit',
                'label'       => '<i class="fa fa-search">&nbsp;</i> ' . Yii::t('EventModule.Event', 'Підібрати'),
            ]
        ); ?>
<!--        <button class="btn btn-default">--><?//=Yii::t('EventModule.events', 'Підібрати')?><!--</button>-->
    </div>



<?php $this->endWidget(); ?>
</div>
<?php if (empty($models)):?>
<!--<div class="label label-info" style="width: 100%; text-align: center; font-size: large">--><?//=Yii::t('EventModule.Event', 'Нажаль нічого не знайдено')?><!--</div>-->
<div class="alert alert-info" style="width: 100%; text-align: center; font-size: large"><?=Yii::t('EventModule.Event', 'Нажаль нічого не знайдено')?></div>
<?php endif;?>
<ul class="list-unstyled">
    <?php foreach ($models as $model): ?>
    <li class="event-list">
        <div class="">
            <div class="row">
            </div>
            <div class="row">
                <div class="event-img col-sm-4">
                    <?php echo CHtml::image($model->image ? $model->getImageUrl() : '#', $model->name, ['class' => 'preview-image img-responsive',]);?>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-12 event-date">
                            <?php echo  Yii::app()->getDateFormatter()->formatDateTime($model->dateTimeStart, "long", false);?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 event-name">
                            <?php echo $model->name?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 event-description">
                            <?php echo $model->description?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="event-detail col-sm-6">
                    <?= !empty($model->organizer->name) ? $model->organizer->name : Yii::app()->name;?> | <?php echo $model->city;?>
                </div>
                <div class="event-city col-sm-6">
                    <a href="<?php echo Yii::app()->createUrl('event/'.$model->id);?>" class="btn btn-default pull-right">
                        <?=strtoupper(Yii::t('EventModule.events', 'Переглянути'))?>
                    </a>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
