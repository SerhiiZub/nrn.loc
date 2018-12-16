<?php
/**
 * Отображение для update:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('EventModule.Event', 'Забеги') => ['/Event/races/index'],
    $model->title => ['/Event/races/view', 'id' => $model->id],
    Yii::t('EventModule.Event', 'Редактирование'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Забеги - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('EventModule.Event', 'Управление Забегами'), 'url' => ['/Event/races/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('EventModule.Event', 'Добавить Забег'), 'url' => ['/Event/races/create']],
    ['label' => Yii::t('EventModule.Event', 'Забег') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('EventModule.Event', 'Редактирование Забега'), 'url' => [
        '/Event/races/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('EventModule.Event', 'Просмотреть Забег'), 'url' => [
        '/Event/races/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('EventModule.Event', 'Удалить Забег'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/Event/races/delete', 'id' => $model->id],
        'confirm' => Yii::t('EventModule.Event', 'Вы уверены, что хотите удалить Забег?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('EventModule.Event', 'Редактирование') . ' ' . Yii::t('EventModule.Event', 'Забега'); ?>        <br/>
        <small>&laquo;<?=  $model->title; ?>&raquo;</small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>