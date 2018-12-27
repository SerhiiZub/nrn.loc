<?php

//var_dump($this->params['items']);
//die;

Yii::import('application.modules.menu.components.YMenu');
$this->widget(
    'bootstrap.widgets.TbNavbar',
    [
        'collapse' => true,
        'brand' => CHtml::image(
            Yii::app()->getTheme()->getAssetsUrl() . '/images/logo.png',
            Yii::app()->name,
            [
                'height' => '48',
                'style' => 'margin-top: -12px;',
            ]
        ),
//        'brandUrl' => ['/'],
//        'brandUrl' => Yii::app()->hasModule('homepage') ? ['/'] : ['/site/index'],
        'items' => [
            [
//                'class' => 'bootstrap.widgets.TbMenu',
//                'type' => 'navbar',
//                'items' => $this->controller->yupe->getLanguageSelectorArray(),
//                'htmlOptions' => [
//                    'class' => 'pull-right',
//                ],
            ],
            CMap::mergeArray(
                [
                    'class' => 'YMenu',
                    'type' => 'navbar',
                    'items' => $this->params['items'],
                    'htmlOptions' => [
                        'class' => 'pull-right',
                    ],
                ],
                $viewParams
            ),

        ],
    ]
);
