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
    Yii::t('EventModule.Event', 'Участники') => ['/Event/eventMembers/index'],
    $model->id => ['/Event/eventMembers/view', 'id' => $model->id],
    Yii::t('EventModule.Event', 'Редактирование'),
];

$this->pageTitle = Yii::t('EventModule.Event', 'Участники - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('EventModule.Event', 'Управление Участниками'), 'url' => ['/Event/eventMembers/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('EventModule.Event', 'Добавить Участника'), 'url' => ['/Event/eventMembers/create']],
    ['label' => Yii::t('EventModule.Event', 'Участник') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('EventModule.Event', 'Редактирование Участника'), 'url' => [
        '/Event/eventMembers/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('EventModule.Event', 'Просмотреть Участника'), 'url' => [
        '/Event/eventMembers/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('EventModule.Event', 'Удалить Участника'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/Event/eventMembers/delete', 'id' => $model->id],
        'confirm' => Yii::t('EventModule.Event', 'Вы уверены, что хотите удалить Участника?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('EventModule.Event', 'Редактирование') . ' ' . Yii::t('EventModule.Event', 'Участника'); ?>        <br/>
        <small>&laquo;<?=  $model->id; ?>&raquo;</small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>