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
    Yii::t('EventModule.Event', 'Типы') => ['/Event/raceBackendType/index'],
    $model->title => ['/Event/raceBackendType/view', 'id' => $model->id],
    Yii::t('EventModule.Event', 'Редактирование'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Типы - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('EventModule.Event', 'Управление Типами'), 'url' => ['/Event/raceBackendType/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('EventModule.Event', 'Добавить Типа'), 'url' => ['/Event/raceBackendType/create']],
    ['label' => Yii::t('EventModule.Event', 'Тип') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('EventModule.Event', 'Редактирование Типа'), 'url' => [
        '/Event/raceBackendType/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('EventModule.Event', 'Просмотреть Типа'), 'url' => [
        '/Event/raceBackendType/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('EventModule.Event', 'Удалить Типа'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/Event/raceBackendType/delete', 'id' => $model->id],
        'confirm' => Yii::t('EventModule.Event', 'Вы уверены, что хотите удалить Типа?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('EventModule.Event', 'Редактирование') . ' ' . Yii::t('EventModule.Event', 'Типа'); ?>        <br/>
        <small>&laquo;<?=  $model->title; ?>&raquo;</small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>