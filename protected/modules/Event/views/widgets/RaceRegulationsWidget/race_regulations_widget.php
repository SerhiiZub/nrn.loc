<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 004 04.12.18
 * Time: 1:31
 *
 * @var RaceRegulation $model
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
            <?=$model->description?>
        </div>
    </div>
    <hr>
    <div class="row">

        <div class="col-sm-12">
            <?php if (!empty($model->file)):?>
                <?php echo CHtml::link('Завантажити регламент',$model->getFileUrl()); ?>
            <?php endif;?>
        </div>
    </div>
</div>
<?php endif;?>
