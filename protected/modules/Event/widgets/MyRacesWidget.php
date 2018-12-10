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
class MyRacesWidget extends yupe\widgets\YWidget
{
    /**
     * @var string
     */
    public $view = 'my_races_widget';

    public function init()
    {
        Yii::import('application.modules.Event.models.*');
        $this->cacheTime = 0;
        $this->module = 'Event';
        $this->limit = 10;
        parent::init();
    }

    /**
     * @throws CException
     */
    public function run(){
        if (Yii::app()->user->getIsGuest()){
            return '';
        }
        $user =Yii::app()->user->getProfile();
        $criteria = new CDbCriteria();
        $criteria->select = 't.rece_id';
        $criteria->addCondition('create_user_id = :id');
        $criteria->params[':id'] = $user->id;

        $races = EventMembers::model()->findAll($criteria);
        if (empty($races) || !is_array($races)){
            return '';
        }
        $myRaces = [];
        foreach ($races as $race){
            $myRaces[] = $race->races;
        }
        return $this->render($this->view, ['myRaces' => $myRaces]);
    }
}
