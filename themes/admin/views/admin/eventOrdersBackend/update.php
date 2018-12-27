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
    Yii::t('AdminModule.admin', 'Оплати учасника') => ['/admin/eventOrdersBackend/index'],
    $model->id => ['/admin/eventOrdersBackend/view', 'id' => $model->id],
    Yii::t('AdminModule.admin', 'Редактирование'),
];

$this->pageTitle = Yii::t('AdminModule.admin', 'Оплати учасника - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('AdminModule.admin', 'Управление Оплатами учасника'), 'url' => ['/admin/eventOrdersBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('AdminModule.admin', 'Добавить Оплати учасника'), 'url' => ['/admin/eventOrdersBackend/create']],
    ['label' => Yii::t('AdminModule.admin', 'Оплата учасника') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('AdminModule.admin', 'Редактирование Оплати учасника'), 'url' => [
        '/admin/eventOrdersBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('AdminModule.admin', 'Просмотреть Оплати учасника'), 'url' => [
        '/admin/eventOrdersBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('AdminModule.admin', 'Удалить Оплати учасника'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/admin/eventOrdersBackend/delete', 'id' => $model->id],
        'confirm' => Yii::t('AdminModule.admin', 'Вы уверены, что хотите удалить Оплати учасника?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('AdminModule.admin', 'Редактирование') . ' ' . Yii::t('AdminModule.admin', 'Оплати учасника'); ?>        <br/>
        <small>&laquo;<?=  $model->id; ?>&raquo;</small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>