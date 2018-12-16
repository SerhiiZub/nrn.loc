<?php
/**
* Класс EventController:
*
*   @category Yupe\yupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class MyEventBackendController extends application\modules\admin\components\AdminController
{
    /**
    * Отображает Мероприятие по указанному идентификатору
    *
    * @param integer $id Идинтификатор Мероприятие для отображения
    *
    * @return void
     *@throws Exception
    */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    
    /**
    * Создает новую модель Мероприятия.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new MyEvent;

        if (Yii::app()->getRequest()->getPost('MyEvent') !== null) {
            $post = Yii::app()->getRequest()->getPost('MyEvent');
            $model->setAttributes($post);
            $model->description = strip_tags($post['description']);

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('EventModule.Event', 'Запись добавлена!')
                );

                $this->redirect(Yii::app()->createUrl('/admin/races/create', ['event' => $model->id]));
//                $model->image->saveAs(Yii::app()->uploadManager->getBasePath() . DIRECTORY_SEPARATOR);
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
        $this->render('create', ['model' => $model]);
    }
    
    /**
    * Редактирование Мероприятия.
    *
    * @param integer $id Идинтификатор Мероприятие для редактирования
    *
    * @return void
     * @throws Exception
    */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (Yii::app()->getRequest()->getPost('MyEvent') !== null) {
            $post = Yii::app()->getRequest()->getPost('MyEvent');
            $model->setAttributes($post);
            $model->description = htmlspecialchars($post['description']);

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('EventModule.Event', 'Запись обновлена!')
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
        $this->render('update', ['model' => $model]);
    }
    
    /**
    * Удаляет модель Мероприятия из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Мероприятия, который нужно удалить
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
    * Управление Мероприятиями.
    *
    * @return void
    */
    public function actionIndex()
    {
        $model = new MyEvent('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('MyEvent') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('MyEvent'));
        $this->render('index', ['model' => $model]);
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
        $model = MyEvent::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('EventModule.Event', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
