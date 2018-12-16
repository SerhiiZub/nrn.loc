<?php
/**
 * Отображение для create:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 *
 * @var Races $model
 * @var MyEvent $event
 **/


$event_id = Yii::app()->getRequest()->getParam('event');
$event_id = !empty($event_id) ? $event_id : '';

$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('EventModule.Event', 'Мероприятия') => [(!empty($event_id) ? '/admin/event/update/'.$event_id : 'admin/event/create')],
    Yii::t('EventModule.Event', 'Добавление Забега'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Забеги - добавление');

//$this->menu = [
//    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('EventModule.Event', 'Управление Забегами'), 'url' => ['/Event/races/index']],
//    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('EventModule.Event', 'Добавить Забег'), 'url' => ['/Event/races/create']],
//];
?>
<div class="page-header">
    <?php if(!empty($event_id)): ?>
        <?=
        CHtml::link(Yii::t('EventModule.Event', 'Вернуться к редактированию мероприятия'),
            Yii::app()->createUrl('/admin/event/update/'.$event_id),
            ['class' => 'btn btn-default'])
        ?>
    <?php endif;?>
<!--    <h1>-->
<!--        --><?//=  Yii::t('EventModule.Event', 'Забеги'); ?>
<!--        <small>--><?//=  Yii::t('EventModule.Event', 'добавление'); ?><!--</small>-->
<!--    </h1>-->
</div>

<?=  $this->renderPartial('_form', ['model' => $model, 'event' => $event]); ?>