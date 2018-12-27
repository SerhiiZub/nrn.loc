<?php

/**
 * BlogsWidget виджет для вывода блогов
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2013 amyLabs && Yupe! team
 * @package yupe.modules.blog.widgets
 * @since 0.1
 *
 */

Yii::import('application.modules.Event.models.*');
Yii::import('application.models.*');

/**
 * Class BlogsWidget
 */
class EventWidget extends yupe\widgets\YWidget
{
    /**
     * @var string
     */
    public $view = 'event_widget';

    public function init()
    {
        $this->cacheTime = 0;
        $this->module = 'Event';
        $this->limit = 10;
//        Yii::app()->theme = 'admin';

        parent::init();
    }

    /**
     * @throws CException
     */
    public function run()
    {
        $filters = Yii::app()->getRequest()->getParam('EventFilter');
        $filters['city'] = !empty($filters['city']) ? $filters['city'] : '';
        $filters['date_from'] = !empty($filters['date_from']) ? $filters['date_from'] : '';
        $filters['date_to'] = !empty($filters['date_to']) ? $filters['date_to'] : '';
        $criteria = new CDbCriteria();
        if (!empty($filters)){
            $criteria->compare('t.city', $filters['city']);
            if (!empty($filters['date_from'])){
                $criteria->addCondition('t.dateTimeStart >= :date_from');
                $criteria->params[':date_from'] = $filters['date_from'];
            }
            if (!empty($filters['date_to'])){
                $criteria->addCondition('t.dateTimeStart < :date_to');
                $criteria->params[':date_to'] = $filters['date_to'];
            }
        }
        $criteria->addCondition('t.status = :status');
        $criteria->params[':status'] = MyEvent::STATUS_ACTIVE;
        $criteria->order = 't.dateTimeStart ASC';

        $models = MyEvent::model()->cache(10)->findAll($criteria);

        $this->render($this->view, ['models' => $models, 'event' => MyEvent::model(), 'filters' => $filters]);
    }
}
