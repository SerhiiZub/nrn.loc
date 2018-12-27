<!DOCTYPE html>
<html lang="<?= Yii::app()->language; ?>">
<head>

    <?php \yupe\components\TemplateEvent::fire(AdminThemeEvents::HEAD_START);?>
<!--	<meta charset="UTF-8">-->
<!--	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Language" content="ru-RU" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?= $this->title;?></title>
    <meta name="description" content="<?= $this->description;?>" />
    <meta name="keywords" content="<?= $this->keywords;?>" />

    <?php if ($this->canonical): ?>
        <link rel="canonical" href="<?= $this->canonical ?>" />
    <?php endif; ?>

    <?php Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/bootstrap/css/bootstrap.min.css')?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/dist/css/AdminLTE.css')?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/dist/css/skins/_all-skins.min.css')?>
    <?php Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/dist/css/style.css')?>

    <?php

    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/main.css');
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/flags.css');
    Yii::app()->getClientScript()->registerCssFile($this->mainAssets . '/css/yupe.css');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/blog.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/bootstrap-notify.js');
    Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.li-translit.js');
    ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<!-- bootstrap 3.0.2 -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

          <![endif]-->

 	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body class="skin-blue sidebar-mini" style="padding-top: 0px; padding-bottom: 0px">

    <!-- Site wrapper -->
    <div class="wrapper">

            <?php
                $this->widget('application.modules.admin.widgets.Navbar', array(
                    'icon'=>'Adm',
                    'brand'=>'Панель управления',
                    'brandUrl'=>$this->createUrl('default/index'),
                    'htmlOptions'=>array('class'=>'navbar-custom-menu'),
                    'items'=>array(
                        array(
                            'class'=>'Messages',
                            'htmlOptions'=>array('class'=>'dropdown messages-menu hidden'),
                            'icon'=>'fa fa-envelope-o',
                            'itemsCssClass'=>'dropdown-menu',
                            'labelHeader'=>array('title'=>'You have {n} messages|You have {n} messages', 'params'=>0),
                            'labelFooter'=>array('title'=>'See All Messages'),
                            'badge'=>array('class'=>'label label-success', 'value'=>0),
                            'items'=>array(
                                array('title'=>'Support Team', 'imageUrl'=>$this->mainAssets.'/dist/img/avatar04.png', 'url'=>'#','icon'=>'fa fa-clock-o','value'=>'Why not buy a new awesome theme?')
                                )
                            ),
                        array(
                            'class'=>'Notifications',
                            'htmlOptions'=>array('class'=>'dropdown notifications-menu hidden'),
                            'icon'=>'fa fa-bell-o',
                            'itemsCssClass'=>'dropdown-menu',
                            'labelHeader'=>array('title'=>'You have {n} notification|You have {n} notifications', 'params'=>16),
                            'labelFooter'=>array('title'=>'View All'),
                            'badge'=>array('class'=>'label label-warning', 'value'=>16),
                            'items'=>array(
                                array('url'=>'#','icon'=>'fa fa-users text-aqua','value'=>'Why not buy a new awesome theme?')
                                )
                            ),
                        array(
                            'class'=>'Users',
                            'htmlOptions'=>array('class'=>'dropdown user user-menu hidden'),
                            'avatar'=> $this->mainAssets.'/dist/img/avatar04.png',
                            'itemsCssClass'=>'dropdown-menu',
                            'items'=>array(
                                array('url'=>'#', 'label'=>Yii::t('app','Change Password')),
                                array('url'=>array('default/logout'), 'label'=>Yii::t('app','Logout'))
                                )
                            ),
                        )
                ));
            ?>

    	    <?php echo $content; ?>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
<!--                    --><?php //echo Yii::powered(); ?>
                </div>
                Copyright &copy; <?php echo date('Y'); ?> by <?=Yii::app()->name?>. All Rights Reserved.
            </footer>


          <div class='control-sidebar-bg'></div>

    </div><!-- ./wrapper -->
    <?php \yupe\components\TemplateEvent::fire(AdminThemeEvents::BODY_END);?>
</body>
</html>
