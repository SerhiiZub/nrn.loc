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
use yupe\events\YupeControllerInitEvent;
use yupe\events\YupeEvents;


abstract class AdminController extends BackController
{
    public $mainAssets;

//    protected function beforeRender($view){
//        parent::beforeRender($view);
//        return Yii::app()->setViewPath('themes.admin.views');
//        var_dump($view);
//        die;
//    }

    public function init()
    {
        Yii::app()->eventManager->fire(YupeEvents::BEFORE_FRONT_CONTROLLER_INIT, new YupeControllerInitEvent($this, Yii::app()->getUser()));
        parent::init();
        $this->layout = 'themes.admin.views.layouts.column2';
        Yii::app()->theme = "admin";
        $this->mainAssets = Yii::app()->getTheme()->getAssetsUrl();
        $bootstrap = Yii::app()->getTheme()->getBasePath() . DIRECTORY_SEPARATOR . "bootstrap.php";
        Yii::app()->getModule('admin')->init();
        Yii::app()->getModule('Event')->init();
        if (is_file($bootstrap)) {
            require $bootstrap;
        }

        Yii::app()->setViewPath(Yii::app()->getBasePath().'/../themes/admin/views/');
    }
}