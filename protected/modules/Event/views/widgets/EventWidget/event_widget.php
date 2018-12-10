<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 025 25.11.18
 * Time: 17:11
 *
 * @var Event[] $models
 */

//var_dump($models);die;
?>
<?php //var_dump($this)?>
<div class="row event-filters">
    Фильтры
    <div class="row col-sm-3">
        <button class="btn btn-default"><?=Yii::t('EventModule.events', 'Місто')?></button>
    </div>
    <div class="row col-sm-3">
        <button class="btn btn-default"><?=Yii::t('EventModule.events', 'Дата')?></button>
    </div>
    <div class="row col-sm-3">
        <button class="btn btn-default"><?=Yii::t('EventModule.events', 'Вид спорту')?></button>
    </div>
    <div class="row col-sm-3">
        <button class="btn btn-default"><?=Yii::t('EventModule.events', 'Підібрати')?></button>
    </div>
</div>

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
                <div class="event-description col-sm-8">
                    <div class="row">
                        <div class="col-sm-12">
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
                <div class="event-detail col-sm-6">
                    <a href="<?php echo Yii::app()->createUrl('event/'.$model->id);?>" class="btn btn-default pull-right">
                        <?=strtoupper(Yii::t('EventModule.events', 'Переглянути'))?>
                    </a>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
