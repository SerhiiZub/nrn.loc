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

class RaceController extends \yupe\components\controllers\FrontController
{

    public function init()
    {
        parent::init();
        $this->layout =  'themes.sportEvents.views.layouts.column2';
    }
    /**
     * Действие "по умолчанию"
     *
     * @return void
     */
	public function actionIndex()
	{
        $this->redirect('/');
/*        $this->breadcrumbs = 'Races';
        $model = new Event('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Event') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Event'));
        $this->render('index', ['model' => $model->findAll()]);*/
	}

    /**
     * Отображает Мероприятие по указанному идентификатору
     *
     * @param integer $id Идинтификатор Мероприятие для отображения
     *
     * @return void
     */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }


    /**
     * Возвращает модель по указанному идентификатору
     * Если модель не будет найдена - возникнет HTTP-исключение.
     *
     * @param integer идентификатор нужной модели
     *
     * @return void
     */
    public function loadModel($id)
    {
        $model = Event::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('EventModule.Event', 'Запрошенная страница не найдена.'));

        return $model;
    }
}