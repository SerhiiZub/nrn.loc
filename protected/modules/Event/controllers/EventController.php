<?php
/**
* EventBackendController контроллер для Event в панели управления
*
* @author yupe team <team@yupe.ru>
* @link http://yupe.ru
* @copyright 2009-2018 amyLabs && Yupe! team
* @package yupe.modules.Event.controllers
* @since 0.1
*
*/

class EventController extends \yupe\components\controllers\FrontController
{

    public function init()
    {
        parent::init();
//        Yii::app()->theme = 'sportEvents';
//        $this->layout = 'main';
        $this->layout =  'themes.sportEvents.views.layouts.column2';
//        $this->layout =  'themes.sportEvents.views.layouts.sport_event';
//        $this->layout =  'themes.sportEvents.views.layouts.yupe';
//        $this->layout =  'themes.sportEvents.views.layouts.main';
//        $this->layout =  'themes.sportEvents.views.layouts.column2';
    }
    /**
     * Действие "по умолчанию"
     *
     * @return void
     */
	public function actionIndex()
	{
//	    var_dump($this);
        $this->breadcrumbs = 'Events';
        $model = new Event('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Event') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Event'));
        $this->render('index', ['model' => $model->findAll()]);
//		$this->render('index');
	}
}