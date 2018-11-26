<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 025 25.11.18
 * Time: 21:19
 */

namespace application\components\MyComponent;


class MenuWidget
{
    /**
     * @var string уникальный код выводимого меню
     */
    public $name;
    /**
     * @var string начиная с id какого родителя начинать вывод меню, по умолчанию 0, корень меню
     */
    public $parent_id = 0;
    /**
     * string данный параметр указывает название layout
     */
    public $view = 'main';
    /**
     * @var array особенные параметры передаваемые в layout
     */
    public $viewParams = [];
    /**
     * @var array параметры виджета zii.widgets.CMenu
     */
    public $params = [];

    /**
     * @throws CException
     */
    public function run()
    {
        $this->params['items'] = Menu::model()->getItems($this->name, $this->parent_id);
        $this->render(
            $this->view,
            [
                'params' => $this->params,
                'viewParams' => $this->viewParams,
            ]
        );
    }
}