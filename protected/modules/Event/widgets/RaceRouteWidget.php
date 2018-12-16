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
class RaceRouteWidget extends yupe\widgets\YWidget
{
    /**
     * @var string
     */
    public $view = 'race_route_widget';

    public $model;

    public function init()
    {
        parent::init();
    }

    /**
     * @throws CException
     */
    public function run()
    {
//        var_dump($this->model);die;
        $this->render($this->view, ['model' => $this->model]);
    }
}
