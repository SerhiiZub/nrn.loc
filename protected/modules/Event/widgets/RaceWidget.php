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
class RaceWidget extends yupe\widgets\YWidget
{
    /**
     * @var string
     */
    public $view = 'race_widget';

    public $data;

    public function init()
    {
        if ($this->data === null || !($this->data instanceof Event)){
            throw new InvalidArgumentException('data must be instanceof Event');
        }
        $this->cacheTime = 0;
        $this->module = 'Event';
        $this->limit = 10;
        parent::init();
    }

    /**
     * @throws CException
     */
    public function run()
    {
        if (!empty($this->data->races)){
            $this->render($this->view, [
                'event' => $this->data,
                'races' => $this->data->races,
            ]);
        }
    }
}
