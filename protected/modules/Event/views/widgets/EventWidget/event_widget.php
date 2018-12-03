<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 025 25.11.18
 * Time: 17:11
 */

//var_dump($models);die;
?>
<?php //var_dump($this)?>

<ul class="list-unstyled">
    <?php foreach ($models as $model): ?>
    <li class="event-list">
        <div class="">
            <div class="row">
                <div class="note event-city col-sm-2">
                    <span>
                        <?php echo $model->city?>
                    </span>
                    <div class="members-count"><small>Members - 15</small></div>
                </div>
                <div class="event-name col-sm-6">
                    <?php echo $model->name?>
                </div>
                <div class="event-date pull-right col-sm-4">
                    <?php echo $model->dateTimeStart?>
                </div>
            </div>
            <div class="row">
                <div class="event-img col-sm-4">
                    <?php echo CHtml::image($model->image ? $model->getImageUrl() : '#', $model->name, ['class' => 'preview-image img-responsive',]);?>
                </div>
                <div class="event-description col-sm-8">
                    <p>
                        <?php echo $model->description?>
                    </p>
                    <div class="block">Test</div>
                </div>
            </div>
            <div class="row">
                <div class="event-detail col-sm-12">
                    <a href="<?php echo Yii::app()->createUrl('event/'.$model->id);?>" class="btn btn-success pull-right">Detail</a><!--                    <a href="--><?php //echo Yii::app()->createUrl('event/view', array('id' => $model->id));?><!--" class="btn btn-success pull-right">Detail</a>-->
<!--                    <a href="--><?php //echo $this->createUrl('event/view/'.$model->id);?><!--" class="btn btn-success pull-right">Detail</a>-->
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
