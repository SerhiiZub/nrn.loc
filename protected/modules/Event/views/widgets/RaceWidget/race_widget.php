<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 003 03.12.18
 * Time: 21:59
 *
 * @var Races[] $races
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
                    <?php if (!empty($model->cost) && $model->cost != 0):?>
                        <button
                                class="btn btn-success pull-left"
                                data-toggle="modal" data-target="#race_modal_<?=$model->id?>"
                        ><?=Yii::t('EventModule.events', 'Придбати зараз')?> (<?=$model->cost?> грн.)
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="race_modal_<?=$model->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title" id="exampleModalLongTitle"><?=Yii::t('EventModule.events', 'Реєстрація учасника')?></h5>
                                    </div>
                                    <div class="modal-body">
                                        <?php $this->widget('application.modules.Event.widgets.MemberRegistrationWidget',[
                                            'race_id' => $model->id,
                                            'event_id' => $model->event_id,
                                            'memberModel' => new EventMembers('insert'),
                                            'race' => $model,
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal end-->
                    <?php else: ?>
                        <a href="<?php echo Yii::app()->createUrl('race/'.$model->id);?>" class="btn btn-success pull-left"><?=Yii::t('EventModule.events', 'Реєстрація безкоштовна')?></a>
                    <?php endif;?>
                </div>

                <div class="race-membersCount col-sm-3">
                    <?php echo $model->getCountMembers();?> чол.
                </div>
                <div class="race-detail col-sm-4">
<!--                    <a href="--><?php //echo Yii::app()->createUrl('race/'.$model->id);?><!--" class="btn btn-success pull-right">Переглянути</a>-->
                    <a href="<?php echo Yii::app()->createUrl('race/'.$model->id);?>" class="btn btn-default pull-right">
                        <?=strtoupper(Yii::t('EventModule.events', 'Переглянути'))?>
                    </a>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
