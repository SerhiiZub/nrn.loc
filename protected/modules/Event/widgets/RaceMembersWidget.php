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

    public $race_id;

    public $event_id;

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
        $criteria = new CDbCriteria();
        $criteria->addCondition('race_id = :race_id');
        $criteria->addCondition('event_id = :event_id');
        $criteria->params = [':race_id' => $this->race_id, ':event_id' => $this->event_id];
        $members = EventMembers::model()->findAll($criteria);
        $this->render($this->view, ['members' => $members]);
    }
}
