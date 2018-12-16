<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 003 03.12.18
 * Time: 23:53
 *
 * @var Races $model
 * @var EventMembers $memberModel
 */
//var_dump($model->route);
?>
<ul class="nav nav-tabs race-tabs">
    <li class="active race-tab-active">
        <a data-toggle="tab" href="#race-info"><?=Yii::t('EventModule.Event', 'Інформація');?></a>
    </li>
    <?php if (!empty($model->regulation)):?>
        <li>
            <a data-toggle="tab" href="#race-regulations"><?=Yii::t('EventModule.Event', 'Регламент');?></a>
        </li>
    <?php endif;?>
    <?php if (!empty($model->route)): ?>
        <li>
            <a data-toggle="tab" href="#race-route"><?=Yii::t('EventModule.Event', 'Маршрут');?></a>
        </li>
    <?php endif;?>
    <li>
        <a data-toggle="tab" href="#race-members"><?=Yii::t('EventModule.Event', 'Учасники');?></a>
    </li>
</ul>

<div class="tab-content race-tab-content">
    <div id="race-info" class="tab-pane fade in active">
        <div class="race-tab-item">
            <h3><?php echo $model->title?></h3>
            <div class="">
                <p style=""><?php echo $model->description?></p>
                <?php $this->widget('application.modules.Event.widgets.RaceInfoWidget',[]); ?>
            </div>
            <div>
                <?php $this->widget('application.modules.Event.widgets.MemberRegistrationWidget',[
                    'race_id' => $model->id,
                    'event_id' => $model->event_id,
                    'memberModel' => $memberModel,
                ]); ?>
            </div>
        </div>
    </div>
    <?php if (!empty($model->regulation)):?>
        <div id="race-regulations" class="tab-pane fade">
            <div class="race-tab-item">
    <!--            <h3>Регламент</h3>-->
                <?php $this->widget('application.modules.Event.widgets.RaceRegulationsWidget',[ 'model' => $model->regulation]); ?>
            </div>
        </div>
    <?php endif;?>
    <?php if (!empty($model->route)): ?>
        <div id="race-route" class="tab-pane fade">
            <div class="race-tab-item">
                <?php $this->widget('application.modules.Event.widgets.RaceRouteWidget',['model' => $model->route]); ?>
            </div>
        </div>
    <?php endif;?>
    <div id="race-members" class="tab-pane fade">
        <div class="race-tab-item">
<!--            <h3>Участники: --><?//=$model->getCountMembers();?><!-- </h3>-->
            <?php $this->widget('application.modules.Event.widgets.RaceMembersWidget',[
                'race_id' => $model->id,
                'event_id' => $model->event_id,
            ]); ?>
        </div>
    </div>
</div>
