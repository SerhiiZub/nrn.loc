<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 003 03.12.18
 * Time: 23:53
 */

?>
<ul class="nav nav-tabs race-tabs">
    <li class="active race-tab-active">
        <a data-toggle="tab" href="#race-info">Информация</a>
    </li>
    <li>
        <a data-toggle="tab" href="#race-regulations">Регламент</a>
    </li>
    <li>
        <a data-toggle="tab" href="#race-route">Маршрут</a>
    </li>
    <li>
        <a data-toggle="tab" href="#race-members">Участники</a>
    </li>
</ul>

<div class="tab-content race-tab-content">
    <div id="race-info" class="tab-pane fade in active">
        <div class="race-tab-item">
            <h3>Информация</h3>
            <div class="">
                <p style="">Some content.</p>
                <?php $this->widget('application.modules.Event.widgets.RaceInfoWidget',[]); ?>
            </div>
            <div>
<!--                member_registration_widget-->
                <?php $this->widget('application.modules.Event.widgets.MemberRegistrationWidget',[]); ?>
            </div>
        </div>
    </div>
    <div id="race-regulations" class="tab-pane fade">
        <div class="race-tab-item">
            <h3>Регламент</h3>
            <p>Some content in menu 1.</p>
            <?php $this->widget('application.modules.Event.widgets.RaceRegulationsWidget',[]); ?>
        </div>
    </div>
    <div id="race-route" class="tab-pane fade">
        <div class="race-tab-item">
            <h3>Маршрут</h3>
            <p>Some content in menu 2.</p>
            <?php $this->widget('application.modules.Event.widgets.RaceRouteWidget',[]); ?>
        </div>
    </div>
    <div id="race-members" class="tab-pane fade">
        <div class="race-tab-item">
            <h3>Участники</h3>
            <p>Some content in menu 2.</p>
            <?php $this->widget('application.modules.Event.widgets.RaceMembersWidget',[]); ?>
        </div>
    </div>
</div>
