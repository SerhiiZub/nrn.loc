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
class RaceMembersWidget extends yupe\widgets\YWidget
{
    /**
     * @var string
     */
    public $view = 'race_members_widget';

    public $data;

    public function init()
    {
        parent::init();
    }

    /**
     * @throws CException
     */
    public function run()
    {
        $this->render($this->view, []);
    }
}
