<?php
/**
 * Entry point script:
 *
 * @category YupeScript
 * @package  YupeCMS
 * @author   Yupe Team <team@yupe.ru>
 * @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 * @link     http://yupe.ru
 **/

/**
 * @link    http://www.yiiframework.ru/doc/guide/ru/basics.entry
 */

if (!ini_get('date.timezone')) {
    date_default_timezone_set('Europe/Moscow');
}

// Setting internal encoding to UTF-8.
if (!ini_get('mbstring.internal_encoding')) {
    @ini_set("mbstring.internal_encoding", 'UTF-8');
    mb_internal_encoding('UTF-8');
}

// Comment next two lines on production
define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require __DIR__ . '/../vendor/yiisoft/yii/framework/yii.php';

$base = require __DIR__ . '/../protected/config/main.php';

$confManager = new yupe\components\ConfigManager();
$confManager->sentEnv(\yupe\components\ConfigManager::ENV_WEB);

require __DIR__ . '/../vendor/autoload.php';

Yii::createWebApplication($confManager->merge($base))->run();

//require_once __DIR__ . './../vendor/autoload.php'; // change path as needed

//$fb = new \Facebook\Facebook([
//    'app_id' => '564855653967119',
//    'app_secret' => '23fbfa89231ef72f459a80246b51454d',
//    'default_graph_version' => 'v2.10',
//    //'default_access_token' => '{access-token}', // optional
//]);

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

//try {
//    // Get the \Facebook\GraphNodes\GraphUser object for the current user.
//    // If you provided a 'default_access_token', the '{access-token}' is optional.
//    $response = $fb->get('/me', 'EAAIBu7SapQ8BADsqne4TON5YKFZAhYWZA0GOvbNhTbkrOZAY0Q2hsMsMbZAK6vOCzt20ZAVYrQD9eCPxl5d4iaFVfABmZAoYF4ND5seAsUO4ZBujzNbDwjhLHGgBOtZCaL1VL3sn9YfsCLNUOZAhOfxHujOGxZCpDxUpj57wbPGoyC6QZDZD');
//} catch(\Facebook\Exceptions\FacebookResponseException $e) {
//    // When Graph returns an error
//    echo 'Graph returned an error: ' . $e->getMessage();
//    exit;
//} catch(\Facebook\Exceptions\FacebookSDKException $e) {
//    // When validation fails or other local issues
//    echo 'Facebook SDK returned an error: ' . $e->getMessage();
//    exit;
//}
//var_dump($response);
//$me = $response->getGraphUser();
//echo 'Logged in as ' . $me->getName().PHP_EOL;
//echo 'Logged in as ' . $me->getEmail().PHP_EOL;
//echo 'Logged in as ' . $me->getLocation().PHP_EOL;
//echo 'Logged in as ' . $me->getLink().PHP_EOL;
