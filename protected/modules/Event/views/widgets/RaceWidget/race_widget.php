<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 003 03.12.18
 * Time: 21:59
 */
?>

<!--<h1>Hello world</h1>-->
<?php //var_dump($races)?>
<ul class="list-unstyled">
    <?php foreach ($races as $model): ?>
        <li class="races-list">
            <div class="">
                <div class="row">
                    <div class="race-img col-sm-4">
                        <?php echo CHtml::image($model->image ? $model->getImageUrl() : $event->getImageUrl(), $model->title, ['class' => 'preview-image img-responsive',]);?>
                    </div>
                    <div class="row col-sm-8">
                        <div class="race-dateTime  col-sm-12">
                            <?php echo $event->dateTimeStart;?>
                        </div>
                        <div class="race-title col-sm-12">
                            <?php echo $model->title;?>
                        </div>
                        <div class="race-description col-sm-12">
                            <?php echo $model->description;?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="race-pay col-sm-5">
                    <a href="<?php echo Yii::app()->createUrl('race/'.$model->id);?>" class="btn btn-success pull-left">Придбати зараз (400 грн.)</a>
                </div>
                <div class="race-membersCount col-sm-3">
                    98 чол.
                </div>
                <div class="race-detail col-sm-4">
                    <a href="<?php echo Yii::app()->createUrl('race/'.$model->id);?>" class="btn btn-success pull-right">Переглянути</a>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
