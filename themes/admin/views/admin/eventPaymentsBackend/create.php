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
    Yii::t('AdminModule.admin', 'Liqpay платежі') => ['/admin/eventPaymentsBackend/index'],
    Yii::t('AdminModule.admin', 'Добавление'),
];

$this->pageTitle = Yii::t('AdminModule.admin', 'Liqpay платежі - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('AdminModule.admin', 'Управление Liqpay платежами'), 'url' => ['/admin/eventPaymentsBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('AdminModule.admin', 'Добавить Liqpay платіж'), 'url' => ['/admin/eventPaymentsBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('AdminModule.admin', 'Liqpay платежі'); ?>
        <small><?=  Yii::t('AdminModule.admin', 'добавление'); ?></small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>