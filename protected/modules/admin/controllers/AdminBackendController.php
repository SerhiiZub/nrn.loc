<?php
/**
* AdminBackendController контроллер для admin в панели управления
*
* @author yupe team <team@yupe.ru>
* @link http://yupe.ru
* @copyright 2009-2018 amyLabs && Yupe! team
* @package yupe.modules.admin.controllers
* @since 0.1
*
*/

class AdminBackendController extends application\modules\admin\components\AdminController
//class AdminBackendController extends \yupe\components\controllers\BackController
{
/*    public $mainAssets;

    public function init()
    {
        parent::init();
        $this->layout = 'themes.backend_admin.views.layouts.main';
        Yii::app()->theme = "backend_admin";
        $this->mainAssets = Yii::app()->getTheme()->getAssetsUrl();
        $bootstrap = Yii::app()->getTheme()->getBasePath() . DIRECTORY_SEPARATOR . "bootstrap.php";

        if (is_file($bootstrap)) {
            require $bootstrap;
        }

    }*/

    /**
     * Действие "по умолчанию"
     *
     * @return void
     */
	public function actionIndex()
	{
        $this->layout = 'themes.admin.views.layouts.column2';
//	    var_dump(Yii::app()->theme);die;
		$this->render('index');
	}
}