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

class LiqpayPaymentController extends \yupe\components\controllers\FrontController
{

    public function init()
    {
        parent::init();
        $this->layout =  'themes.sportEvents.views.layouts.column2';
    }

    public function actionPay()
    {

    }

    public function actionSuccess()
    {

    }


    /**
     * Действие "по умолчанию"
     *
     * @return void
     */
	public function actionIndex()
	{
//        $this->breadcrumbs = 'Events';
//        $model = new Event('search');
//        $model->unsetAttributes(); // clear any default values
//        if (Yii::app()->getRequest()->getParam('Event') !== null)
//            $model->setAttributes(Yii::app()->getRequest()->getParam('Event'));
//        $this->render('index', ['model' => $model->findAll()]);
	}

    /**
     * Отображает Мероприятие по указанному идентификатору
     *
     * @param integer $id Идинтификатор Мероприятие для отображения
     *
     * @return void
     * @throws Exception
     */
    public function actionView($id)
    {
//        $this->render('view', ['model' => $this->loadModel($id)]);
    }


    /**
     * Возвращает модель по указанному идентификатору
     * Если модель не будет найдена - возникнет HTTP-исключение.
     *
     * @param integer идентификатор нужной модели
     *
     * @return void
     * @throws Exception
     */
    public function loadModel($id)
    {
//        $model = Event::model()->findByPk($id);
//        if ($model === null)
//            throw new CHttpException(404, Yii::t('EventModule.Event', 'Запрошенная страница не найдена.'));
//
//        return $model;
    }
}