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

Yii::import('application.modules.Event.models.Event');

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
        $models = Event::model()->cache(10)->findAll(
                [
/*                    'order'  => 'count(id) DESC',
                    'limit'  => $this->limit,*/
                ]
            );

        $this->render($this->view, ['models' => $models]);
    }
}
