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
    Yii::t('AdminModule.admin', 'Слайдери') => ['/admin/eventSliderBackend/index'],
    $model->id => ['/admin/eventSliderBackend/view', 'id' => $model->id],
    Yii::t('AdminModule.admin', 'Редактирование'),
];

$this->pageTitle = Yii::t('AdminModule.admin', 'Слайдери - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('AdminModule.admin', 'Управление Слайдерами'), 'url' => ['/admin/eventSliderBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('AdminModule.admin', 'Добавить Слайдер'), 'url' => ['/admin/eventSliderBackend/create']],
    ['label' => Yii::t('AdminModule.admin', 'Слайдер') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('AdminModule.admin', 'Редактирование Слайдера'), 'url' => [
        '/admin/eventSliderBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('AdminModule.admin', 'Просмотреть Слайдер'), 'url' => [
        '/admin/eventSliderBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('AdminModule.admin', 'Удалить Слайдер'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/admin/eventSliderBackend/delete', 'id' => $model->id],
        'confirm' => Yii::t('AdminModule.admin', 'Вы уверены, что хотите удалить Слайдер?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('AdminModule.admin', 'Редактирование') . ' ' . Yii::t('AdminModule.admin', 'Слайдера'); ?>        <br/>
        <small>&laquo;<?=  $model->id; ?>&raquo;</small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>