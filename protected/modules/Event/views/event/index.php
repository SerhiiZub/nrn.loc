<?php
/**
* Отображение для EventBackend/index
*
 * @model Event
* @category YupeView
* @package  yupe
* @author   Yupe Team <team@yupe.ru>
* @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
* @link     http://yupe.ru
 * @param Event $model
**/
$this->breadcrumbs = [
    Yii::t('EventModule.Event', 'Event') => ['/Event/EventBackend/index'],
    Yii::t('EventModule.Event', 'Index'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Event - index');

$this->menu = $this->getModule()->getNavigation();
die;
?>

<div class="page-header">
    <h1>
        <?php echo Yii::t('EventModule.Event', 'Event'); ?>
        <small><?php echo Yii::t('EventModule.Event', 'Index'); ?></small>
    </h1>
</div>

<?php $this->widget('application.modules.Event.widgets.EventWidget'); ?>