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
    Yii::t('AdminModule.admin', 'Налаштування') => ['/admin/eventOptionsBackend/index'],
    Yii::t('AdminModule.admin', 'Добавление'),
];

$this->pageTitle = Yii::t('AdminModule.admin', 'Налаштування - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('AdminModule.admin', 'Управление Налаштуваннями'), 'url' => ['/admin/eventOptionsBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('AdminModule.admin', 'Добавить Налаштування'), 'url' => ['/admin/eventOptionsBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('AdminModule.admin', 'Налаштування'); ?>
        <small><?=  Yii::t('AdminModule.admin', 'добавление'); ?></small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>