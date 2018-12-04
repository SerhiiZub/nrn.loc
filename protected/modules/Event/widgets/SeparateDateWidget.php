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
class SeparateDateWidget extends yupe\widgets\YWidget
{
    /**
     * @var string
     */
    public $view = 'separate_date_widget';

    /**
     * @var CModel
     */
    public $model;

    public $attribute;

    public function init()
    {
        if (!$this->model || !($this->model instanceof CModel)){
            throw new InvalidArgumentException('Model must be instanceof CModel');
        }
        if (!is_string($this->attribute)){
            throw new InvalidArgumentException('attribute invalid');
        }
        parent::init();
    }

    /**
     * @throws CException
     */
    public function run()
    {
        $name = get_class($this->model);
        $this->render($this->view, ['name' => $name, 'attribute' => $this->attribute]);
    }
}
