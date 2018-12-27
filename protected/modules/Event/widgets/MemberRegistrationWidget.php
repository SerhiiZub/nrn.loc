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
class MemberRegistrationWidget extends yupe\widgets\YWidget
{
    /**
     * @var string
     */
    public $view = 'member_registration_widget';

    public $race_id;
    public $event_id;
    public $memberModel;
    /**
     * @var Races
     */
    public $race;

    public $data;

    public function init()
    {
        $this->cacheTime = 0;
        $this->module = 'Event';
        $this->limit = 10;
        if (empty($this->race)){
            $this->race = Races::model()->findByPk($this->race_id);
        }
        parent::init();
    }

    /**
     * @throws CException
     */
    public function run()
    {

        $model = !empty($this->memberModel) ? $this->memberModel : new EventMembers();

        if (!Yii::app()->user->getIsGuest()){
            $user =Yii::app()->user->getProfile();

            $criteria = new CDbCriteria();
            $criteria->addCondition('event_id = :event_id');
            $criteria->addCondition('race_id = :race_id');
            $criteria->addCondition('create_user_id = :create_user_id');
            $criteria->params = [':event_id' => $this->event_id, ':race_id' => $this->race_id, ':create_user_id' => $user->id];
            $result = EventMembers::model()->findAll($criteria);
            if (!empty($result)){
                return $this->render('already_registered');
            }
            $model->first_name = !empty($model->first_name) ? $model->first_name : $user->first_name;
            $model->last_name = !empty($model->last_name) ? $model->last_name : $user->last_name;
            $model->email = !empty($model->email) ? $model->email : $user->email;
            $model->phone = !empty($model->phone) ? $model->phone : $user->phone;
            $model->sex = !empty($model->sex) ? $model->sex : $user->gender;
//            $model->city = !empty($model->city) ? $model->city : $user->city;
//            $model->last_name = $user->last_name;
        }
        $model->event_id = $this->event_id;
        $model->race_id = $this->race_id;
        $model->user_id = $user->id;
        $model->start_number = $this->race->start_number_prefix . (rand(1, 100));
//        $model->start_number = $this->race->start_number_prefix . ($this->race->getCountMembers() + 1);
        return $this->render($this->view, ['model' => $model, 'race' => $this->race]);
    }
}
