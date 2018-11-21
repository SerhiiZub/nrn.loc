<?php
/**
* Отображение для admin/index
*
* @category YupeView
* @package  yupe
* @author   Yupe Team <team@yupe.ru>
* @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
* @link     http://yupe.ru
**/
$this->pageTitle = Yii::t('AdminModule.admin', 'admin');
$this->description = Yii::t('AdminModule.admin', 'admin');
$this->keywords = Yii::t('AdminModule.admin', 'admin');

$this->breadcrumbs = [Yii::t('AdminModule.admin', 'admin')];
?>

<h1>
    <small>
        <?php echo Yii::t('AdminModule.admin', 'admin'); ?>
    </small>
</h1>