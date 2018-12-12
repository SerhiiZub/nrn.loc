<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 025 25.11.18
 * Time: 17:11
 *
 * @var Event[] $models
 */
?>
<?php
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'action'      => Yii::app()->createUrl('/'),
//        'action'      => Yii::app()->createUrl($this->route),
        'method'      => 'get',
        'type'        => 'horizontal',
//        'type'        => 'vertical',
        'htmlOptions' => [
//                'class' => 'form-inline'
//                'class' => 'well'
        ],
    ]
);
?>

<div class="row event-filters">
<!--    Фильтры-->
    <div class="col-sm-2 form-group">
        <input type="text" class="form-control" name="city" placeholder="<?=Yii::t('EventModule.events', 'Місто')?>">
<!--        <input type="text" class="btn btn-default">--><?//=Yii::t('EventModule.events', 'Місто')?><!--</input>-->
    </div>
    <div class="col-sm-2 form-group">
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
                'name' => 'date_from',
                'placeholder' => Yii::t('EventModule.events', 'дата від'),
//                    'style'=>'height:20px;'
            ),
        ));
        ?>
    </div>
    <div class="col-sm-2 form-group">
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
                'name' => 'date_to',
                'placeholder' => Yii::t('EventModule.events', 'дата до'),
//                    'style'=>'height:20px;'
            ),
        ));
        ?>
    </div>
    <div class="col-sm-2 form-group">
        <input type="text" class="form-control" placeholder="<?=Yii::t('EventModule.events', 'Вид спорту')?>">
<!--        <button class="btn btn-default">--><?//=Yii::t('EventModule.events', 'Вид спорту')?><!--</button>-->
    </div>
    <div class="col-sm-3 form-group">
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
</div>


<?php $this->endWidget(); ?>

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
                    NewRun | <?php echo $model->city;?>
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
