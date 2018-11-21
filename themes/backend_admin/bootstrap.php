<?php
/**
 * Theme bootstrap file.
 */
Yii::app()->getComponent('bootstrap');

Yii::app()->getClientScript()->registerScript('baseUrl', "var baseUrl = '" . Yii::app()->getBaseUrl(true) . "';", CClientScript::POS_HEAD);

// Favicon
Yii::app()->getClientScript()->registerLinkTag('shortcut icon', null, Yii::app()->getTheme()->getAssetsUrl() . '/images/favicon.ico');

//var_dump('themes.'.Yii::app()->theme->name.'.AdminThemeEvents');die;
Yii::import('themes.'.Yii::app()->theme->name.'.AdminThemeEvents');
