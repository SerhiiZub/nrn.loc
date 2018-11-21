<?php
/**
* Отображение для adminBackend/index
*
* @category YupeView
* @package  yupe
* @author   Yupe Team <team@yupe.ru>
* @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
* @link     http://yupe.ru
**/
$this->breadcrumbs = [
    Yii::t('AdminModule.admin', 'admin') => ['/admin/adminBackend/index'],
    Yii::t('AdminModule.admin', 'Index'),
];

$this->pageTitle = Yii::t('AdminModule.admin', 'admin - index');

$this->menu = $this->getModule()->getNavigation();
?>

<div class="page-header">
    <h1>
        <?php echo Yii::t('AdminModule.admin', 'admin theme'); ?>
        <small><?php echo Yii::t('AdminModule.admin', 'Index'); ?></small>
    </h1>
</div>