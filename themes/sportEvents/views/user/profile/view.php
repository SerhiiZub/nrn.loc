<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 009 09.12.18
 * Time: 14:43
 *
 * @var User $user
 */

?>

<div class="row my-profile">
    <div class="col-xs-3">
        <?php $this->widget('AvatarWidget', ['user' => $user, 'noCache' => true, 'imageHtmlOptions' => ['width' => 100, 'height' => 100]]); ?>
    </div>
    <div class="col-xs-9">
        <div>Кабінет учасника</div>
        <div><h3><?php echo sprintf('%s %s %s', ucfirst($user->last_name), ucfirst($user->first_name), ucfirst($user->middle_name))?></h3></div>
        <div>
            <?php echo CHtml::link('Редагувати профіль',array('/profile/update'), ['class' => 'btn btn-default']); ?>
        </div>
    </div>
</div>
<div class="row my-races">
    <div class="col-xs-10">
        <?php $this->widget('application.modules.Event.widgets.MyRacesWidget',[]); ?>
    </div>
</div>
