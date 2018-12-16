<?php
/**
* Класс RacesController:
*
*   @category Yupe\yupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class RacesBackendController extends application\modules\admin\components\AdminController
{
    /**
    * Отображает Забег по указанному идентификатору
    *
    * @param integer $id Идинтификатор Забег для отображения
    *
    * @return void
     * @throws Exception
    */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    
    /**
    * Создает новую модель Забега.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new Races;
        $event_id  = Yii::app()->getRequest()->getParam('event');
        $event = MyEvent::model()->findByPk((int)$event_id);
        if($event_id && $event){
            $model->event_id = $event->id;
        }

        if (Yii::app()->getRequest()->getPost('Races') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Races'));

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('EventModule.Event', 'Запись добавлена!')
                );

                $this->redirect(
                    (array)Yii::app()->getRequest()->getPost(
                        'submit-type',
                        [
                            'update',
                            'id' => $model->id
                        ]
                    )
                );
            }
        }
        $v = $model->getErrors();
        $this->render('create', ['model' => $model, 'event' => $event]);
    }
    
    /**
    * Редактирование Забега.
    *
    * @param integer $id Идинтификатор Забег для редактирования
    *
    * @return void
     * @throws Exception
    */
    public function actionUpdate($id)
    {
        /**
         * @var Races $model
         */
        $model = $this->loadModel($id);
        if (Yii::app()->getRequest()->getPost('Races') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Races'));

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('EventModule.Event', 'Запись обновлена!')
                );

                $next = Yii::app()->getRequest()->getPost('submit-type');
                switch ($next){
                    case 'regulation':
                        $this->redirect(['regulation', 'id' => $model->id]);
                        break;
                    case 'route':
                        $this->redirect(['route', 'id' => $model->id]);
                        break;
                    case 'add':
                        $this->redirect(['create', 'event' => $model->event_id]);
                        break;
                    default:
                        $this->redirect(
                            (array)Yii::app()->getRequest()->getPost(
                                'submit-type',
                                [
                                    'update',
                                    'id' => $model->id
                                ]
                            )
                        );
                }
            }
        }
        $this->render('update', ['model' => $model]);
    }
    
    /**
    * Удаляет модель Забега из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Забега, который нужно удалить
    *
    * @return void
     * @throws Exception
    */
    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            // поддерживаем удаление только из POST-запроса
            $this->loadModel($id)->delete();

            Yii::app()->user->setFlash(
                yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                Yii::t('EventModule.Event', 'Запись удалена!')
            );

            // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                $this->redirect(Yii::app()->getRequest()->getPost('returnUrl', ['index']));
            }
        } else
            throw new CHttpException(400, Yii::t('EventModule.Event', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
    }
    
    /**
    * Управление Забегами.
    *
    * @return void
    */
    public function actionIndex()
    {
        $model = new Races('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Races') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Races'));
        $this->render('index', ['model' => $model]);
    }

    /**
     * @param $id
     * @throws Exception
     */
    public function actionRegulation($id)
    {
        /**
         * @var Races $race
         */
        $race = $this->loadModel($id);
        $model = RaceRegulation::model()->findByAttributes(['race_id' => $race->id]);

        if (Yii::app()->getRequest()->getPost('submit-type') == 'save'){
            if (!$model){
                $model = new RaceRegulation('insert');
            }
            $model->setAttributes(Yii::app()->getRequest()->getPost('RaceRegulation'));

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('EventModule.Event', 'Запись добавлена!')
                );
                $this->redirect(['update', 'id' => $race->id]);
            }
        }

        if (!$model){
            $model = new RaceRegulation('insert');
            $model->race_id = $race->id;
            return $this->render('regulation_create', ['model' => $model]);
        }
        return $this->render('regulation_update', ['model' => $model, 'event_id' => $race->event_id]);
    }

    /**
     * @param $id
     * @return string
     * @throws Exception
     *
     */
    public function actionRoute($id)
    {
        /**
         * @var Races $race
         */
        $race = $this->loadModel($id);
        $model = RaceRoute::model()->findByAttributes(['race_id' => $race->id]);

        if (Yii::app()->getRequest()->getPost('submit-type') == 'save'){
            if (!$model){
                $model = new RaceRoute('insert');
            }
            $model->setAttributes(Yii::app()->getRequest()->getPost('RaceRoute'));

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('EventModule.Event', 'Запись добавлена!')
                );
                $this->redirect(['update', 'id' => $race->id]);
            }
        }

        if (!$model){
            $model = new RaceRoute('insert');
            $model->race_id = $race->id;
            return $this->render('regulation_create', ['model' => $model]);
        }
        return $this->render('regulation_update', ['model' => $model, 'event_id' => $race->event_id]);
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
        $model = Races::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('EventModule.Event', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
