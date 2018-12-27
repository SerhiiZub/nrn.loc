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
    Yii::t('AdminModule.admin', 'Налаштування') => ['/admin/eventOptionsBackend/index'],
    $model->id => ['/admin/eventOptionsBackend/view', 'id' => $model->id],
    Yii::t('AdminModule.admin', 'Редактирование'),
];

$this->pageTitle = Yii::t('AdminModule.admin', 'Налаштування - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('AdminModule.admin', 'Управление Налаштуваннями'), 'url' => ['/admin/eventOptionsBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('AdminModule.admin', 'Добавить Налаштування'), 'url' => ['/admin/eventOptionsBackend/create']],
    ['label' => Yii::t('AdminModule.admin', 'Налаштування') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('AdminModule.admin', 'Редактирование Налаштування'), 'url' => [
        '/admin/eventOptionsBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('AdminModule.admin', 'Просмотреть Налаштування'), 'url' => [
        '/admin/eventOptionsBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('AdminModule.admin', 'Удалить Налаштування'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/admin/eventOptionsBackend/delete', 'id' => $model->id],
        'confirm' => Yii::t('AdminModule.admin', 'Вы уверены, что хотите удалить Налаштування?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('AdminModule.admin', 'Редактирование') . ' ' . Yii::t('AdminModule.admin', 'Налаштування'); ?>        <br/>
        <small>&laquo;<?=  $model->id; ?>&raquo;</small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>