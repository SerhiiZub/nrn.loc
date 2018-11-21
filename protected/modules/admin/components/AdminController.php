<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 20.11.18
 * Time: 14:40
 */

namespace application\modules\admin\components;
use \yupe\components\controllers\BackController;
use \Yii;


abstract class AdminController extends BackController
{
    public $mainAssets;

    public function init()
    {
        parent::init();
        $this->layout = 'themes.admin.views.layouts.column2';
//        $this->layout = 'themes.backend_admin.views.layouts.column2';
//        $this->layout = 'themes.backend_admin.views.layouts.main';
        Yii::app()->theme = "admin";
//        Yii::app()->theme = "backend_admin";
        $this->mainAssets = Yii::app()->getTheme()->getAssetsUrl();
        $bootstrap = Yii::app()->getTheme()->getBasePath() . DIRECTORY_SEPARATOR . "bootstrap.php";

        if (is_file($bootstrap)) {
            require $bootstrap;
        }

    }
}