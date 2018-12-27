<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 004 04.12.18
 * Time: 1:31
 *
 * @var RaceRoute $model
 */

?>
<?php if (!empty($model)):?>
<div class="" style="padding: 20px">
    <div class="row">
        <div class="col-sm-12" style="text-align: center">
            <h4><b><?=$model->title ?></b></h4>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-12">
            <?php if (!empty($model->image)):?>
                <?php echo CHtml::image(
                    !$model->getIsNewRecord() && $model->image ? $model->getImageUrl() : '#',
                    $model->title,
                    [
                        'class' => 'img-responsive',
                        'style' =>  ' width: 100%;'. (!$model->getIsNewRecord() && $model->image ? '' : 'display:none;'),
                    ])
                ?>
            <?php endif;?>
        </div>
    </div>
    <br>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <!--            --><?//= Yii::app()->getDateFormatter()->?>
            <?=$model->description?>
        </div>
    </div>
</div>
<?php endif;?>
