<?php
/**
* Класс EventOrdersBackendController:
*
*   @category Yupe\yupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class EventOrdersBackendController extends application\modules\admin\components\AdminController
{
    /**
    * Отображает Оплати учасника по указанному идентификатору
    *
    * @param integer $id Идинтификатор Оплати учасника для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    
    /**
    * Создает новую модель Оплати учасника.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new EventOrders;

        if (Yii::app()->getRequest()->getPost('EventOrders') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('EventOrders'));
        
            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('AdminModule.admin', 'Запись добавлена!')
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
        $this->render('create', ['model' => $model]);
    }
    
    /**
    * Редактирование Оплати учасника.
    *
    * @param integer $id Идинтификатор Оплати учасника для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (Yii::app()->getRequest()->getPost('EventOrders') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('EventOrders'));

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('AdminModule.admin', 'Запись обновлена!')
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
    * Удаляет модель Оплати учасника из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Оплати учасника, который нужно удалить
    *
    * @return void
    */
    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            // поддерживаем удаление только из POST-запроса
            $this->loadModel($id)->delete();

            Yii::app()->user->setFlash(
                yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                Yii::t('AdminModule.admin', 'Запись удалена!')
            );

            // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                $this->redirect(Yii::app()->getRequest()->getPost('returnUrl', ['index']));
            }
        } else
            throw new CHttpException(400, Yii::t('AdminModule.admin', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
    }
    
    /**
    * Управление Оплатами учасника.
    *
    * @return void
    */
    public function actionIndex()
    {
        $model = new EventOrders('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('EventOrders') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('EventOrders'));
        $this->render('index', ['model' => $model]);
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
        $model = EventOrders::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('AdminModule.admin', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
