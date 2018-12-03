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
    Yii::t('EventModule.Event', 'Категории') => ['/Event/raceAgeBackendCategory/index'],
    $model->title => ['/Event/raceAgeBackendCategory/view', 'id' => $model->id],
    Yii::t('EventModule.Event', 'Редактирование'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Категории - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('EventModule.Event', 'Управление Категориями'), 'url' => ['/Event/raceAgeBackendCategory/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('EventModule.Event', 'Добавить Категорию'), 'url' => ['/Event/raceAgeBackendCategory/create']],
    ['label' => Yii::t('EventModule.Event', 'Категория') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('EventModule.Event', 'Редактирование Категории'), 'url' => [
        '/Event/raceAgeBackendCategory/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('EventModule.Event', 'Просмотреть Категорию'), 'url' => [
        '/Event/raceAgeBackendCategory/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('EventModule.Event', 'Удалить Категорию'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/Event/raceAgeBackendCategory/delete', 'id' => $model->id],
        'confirm' => Yii::t('EventModule.Event', 'Вы уверены, что хотите удалить Категорию?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('EventModule.Event', 'Редактирование') . ' ' . Yii::t('EventModule.Event', 'Категории'); ?>        <br/>
        <small>&laquo;<?=  $model->title; ?>&raquo;</small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>