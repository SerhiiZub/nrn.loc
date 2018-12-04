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

    public $data;

    public function init()
    {
/*        if ($this->data === null || !($this->data instanceof Event)){
            throw new InvalidArgumentException('data must be instanceof Event');
        }
        $this->cacheTime = 0;
        $this->module = 'Event';
        $this->limit = 10;*/
        parent::init();
    }

    /**
     * @throws CException
     */
    public function run()
    {
//        CModel::scenario;
//        if (!empty($this->memberModel)){
//
//        }
        $model = !empty($this->memberModel) ? $this->memberModel : new EventMembers();
        $model->event_id = $this->event_id;
        $model->rece_id = $this->race_id;
        $this->render($this->view, ['model' => $model]);
/*        if (!empty($this->data->races)){
            $this->render($this->view, [
                'event' => $this->data,
                'races' => $this->data->races,
            ]);
        }*/
    }
}
