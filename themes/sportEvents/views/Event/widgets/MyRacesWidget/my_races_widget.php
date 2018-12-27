<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 010 10.12.18
 * Time: 18:44
 *
 * @var EventMembers[] $myRaces
 */



?>
<h3>Мої забіги:</h3>
<ul class="list-unstyled">
    <?php if (!empty($myRaces)) :?>
    <?php foreach ($myRaces as $model): ?>
        <?php if (empty($model->races)):?>
            <?php continue?>
        <?php endif;?>
        <li class="races-list">
            <div class="">
                <div class="row">
                    <div class="race-img col-sm-4">
                        <?php $img = !empty($model->races->image) ? $model->races->getImageUrl() : Event::model()->findByPk($model->races->event_id)->getImageUrl()?>
                        <?php echo CHtml::image($model->races->image ? $model->races->getImageUrl() : $model->races->event->getImageUrl(), $model->races->title, ['class' => 'preview-image img-responsive',]);?>
                    </div>
                    <div class="col-sm-10">
                            <div class="event-name col-sm-6">
                                <?php echo $model->races->event->name;?>
                            </div>
                            <div class="event-start  col-sm-6" style="margin-bottom: 5px">
                                <span class="pull-right">
                                    <?php echo !empty($model->races->event->organizer->name) ? $model->races->event->organizer->name : Yii::app()->name;?> |
                                    <?php echo $model->races->event->city;?> |
                                    <?php echo  Yii::app()->getDateFormatter()->formatDateTime($model->races->event->dateTimeStart, "long", false);?>
                                </span>
                            </div>
                        <br>
                        <hr>
                        <div class="race-title col-sm-12">
                            <?php echo $model->races->title;?>
                        </div>
                        <div class="race-description col-sm-12">
                            <?php echo $model->races->description;?>
                        </div>
                    </div>
                </div>
            </div>
            <?php //todo member data?>
            <hr>
            <div class="row">
                <div class="race-pay col-sm-5">
                    <?php if ((isset($model->races->cost) && $model->races->cost == 0) || $model->payment_status == EventMembers::PAYMENT_FREE):?>
                        <button class="btn btn-default pull-left"><?=Yii::t('EventModule.events', 'Реєстрація безкоштовна')?></button>
                    <?php elseif (empty($model->races->event->organizer->public_key) || empty($model->races->event->organizer->private_key) || empty($model->races->cost)):?>
                        <button class="btn btn-default pull-left"><?=Yii::t('EventModule.events', 'Оплата недоступна')?></button>
                    <?php elseif ($model->races->cost != 0):?>
                        <?php if ($model->payment_status == EventMembers::PAYMENT_WAIT):?>
                            <?php $this->widget('application.modules.Event.widgets.LiqpayBtnWidget',[
                                'cost' => $model->races->cost,
                                'public_key' => $model->races->event->organizer->public_key,
                                'private_key' => $model->races->event->organizer->private_key,
                            ]); ?>
                        <?php elseif ($model->payment_status == EventMembers::PAYMENT_ERROR):?>
                            <span class="label label-danger"><?=Yii::t('EventModule.events', 'Помилка оплати')?></span>
                            <?php $this->widget('application.modules.Event.widgets.LiqpayBtnWidget',[
                                'cost' => $model->races->cost,
                                'public_key' => $model->races->event->organizer->public_key,
                                'private_key' => $model->races->event->organizer->private_key,
                            ]); ?>
                        <?php elseif ($model->payment_status == EventMembers::PAYMENT_SUCCESS):?>
                            <button class="btn btn-default pull-left"><?=Yii::t('EventModule.events', 'Сплачено')?></button>
                        <?php else:?>
                            <button class="btn btn-default pull-left"><?=Yii::t('EventModule.events', 'Статус оплати невідомий')?></button>
                        <?php endif;?>
                    <?php else:?>
                        <button class="btn btn-default pull-left"><?=Yii::t('EventModule.events', 'Оплата недоступна')?></button>
                    <?php endif;?>
                </div>
                <div class="race-membersCount col-sm-3">
                    <?php echo $model->races->getCountMembers();?> чол.
                </div>
                <div class="race-detail col-sm-4">
                    <a href="<?php echo Yii::app()->createUrl('race/'.$model->races->id);?>" class="btn btn-default pull-right"><?=Yii::t('EventModule.events', 'Переглянути')?></a>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
    <?php else:?>
        <div class="empty-my-races"><?=Yii::t('EventModule.events', 'Ви ще не зареєстровані на жоден забіг');?></div>
    <?php endif;?>
</ul>
