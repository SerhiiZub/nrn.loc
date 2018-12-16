<?php
/**
 * Отображение для create:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('EventModule.Event', 'Мероприятия') => ['/admin/event/create'],
    Yii::t('EventModule.Event', 'Добавление'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Мероприятия - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('EventModule.Event', 'Управление Мероприятиями'), 'url' => ['/Event/event/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('EventModule.Event', 'Добавить Мероприятие'), 'url' => ['/Event/event/create']],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('EventModule.Event', 'Мероприятия'); ?>
        <small><?=  Yii::t('EventModule.Event', 'добавление'); ?></small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>