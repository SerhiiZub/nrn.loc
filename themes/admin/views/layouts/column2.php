<?php $this->beginContent('//layouts/main'); ?>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

             <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $this->mainAssets.'/dist/img/avatar04.png'?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo Yii::t('app','Hello'); ?>, <?php echo ucfirst(Yii::app()->user->name); ?></p>
                            <a><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php $this->widget('zii.widgets.CMenu',array(
                            'htmlOptions'=>array('class'=>'sidebar-menu'),
                            'encodeLabel' => false,
                            'items'=>array(
                                array('label'=>Menu::link('Admin menu'), 'itemOptions'=>array('class'=>'header')),
//                                array('label'=>Menu::link('Dashboard', 'fa fa-dashboard'), 'url'=>array('/admin/default/index')),
                                array('label'=>Menu::link('Користувачі', 'fa fa-user'), 'url'=>array('/admin/user'), 'items' => [
//                                    array('label'=>'Roles', 'url'=>array('/backend/rbac/rbac/userList')),
//                                    array('label'=>'Level 4 Two', 'url'=>array('product/index')),
                                ]),
//                                array('label'=>Menu::link('Users', 'fa fa-user-cog'), 'url'=>array('default/index')),
                                array('label'=>Menu::link('Спортивні Заходи', 'fa fa-users'), 'url'=>array('/admin/events/index')),
                                array('label'=>Menu::link('Організатори', 'fa fa-users'), 'url'=>array('/admin/organizers/index')),
                                array('label'=>Menu::link('Забіги', 'fa running'), 'url'=>array('/admin/races/index')),
                                array('label'=>Menu::link('Учасники', 'fa running'), 'url'=>array('/admin/members/index')),
//                                array('label'=>Menu::link('Promo codes', 'fa running'), 'url'=>array('/admin/promoCodes/index')),
//                                array('label'=>Menu::link('Payments', 'fa running'), 'url'=>array('/backend/payment/payment')),
                                array('label'=>Menu::link('Типи забігів', 'fa running'), 'url'=>array('/admin/raceTypes')),
                                array('label'=>Menu::link('Вікові категорії', 'fa running'), 'url'=>array('/admin/raceAges')),
                            ),
                    )); ?>

<!--                    --><?php
//                    $this->widget(
//                        'bootstrap.widgets.TbNavbar',
//                        [
//                            'fluid'    => true,
//                            'fixed'    => 'right',
//                            /*'brand'    => CHtml::image(
//                                $mainAssets . '/img/logo.png',
//                                CHtml::encode(Yii::app()->name),
//                                [
//                                    'width'  => '38',
//                                    'height' => '38',
//                                    'title'  => CHtml::encode(Yii::app()->name),
//                                ]
//                            ),*/
//                            'brandUrl' => CHtml::normalizeUrl(["/yupe/backend/index"]),
//                            'items'    => [
//                                [
//                                    'class' => 'bootstrap.widgets.TbMenu',
//                                    'type'  => 'navbar',
//                                    'encodeLabel' => false,
//                                    'items' => Yii::app()->moduleManager->getModules(true),
//                                ],
//                        ],
//                    ]);
//                    ?>

                    <?php /*$this->widget('zii.widgets.CMenu',array(
                        'htmlOptions' => array(
                            'class' => 'sidebar-menu',
                        ),
                        'submenuHtmlOptions' => array(
                            'class' => 'submenu',
                        ),
                        'encodeLabel' => false,
                        'activeCssClass'=>'active',
                        'activateParents'=>true,
                        'items' => array(
                            array(
                                'label' => '<i class="fa fa-cog"></i>&nbsp;
                                    <span class="hidden-sm hidden-md">Configurations</span>
                                    <i class="fa fa-angle-right chevron-icon-sidebar"></i>',
                                'url' => '#',
                                'itemOptions' => array('class' => 'dropdown'),
                                'linkOptions' => array(
                                    'class' => 'dropdown-toggle ',
                                    'data-toggle' => 'dropdown-menu',
                                ),
                                'visible' => true,
                                'items' => array(
                                    array(
                                        'label' => 'Sales Management',
                                        'url' => '',
                                        'visible' => true,
                                        'itemOptions' => array(
                                            'class' => 'dropdown-submenu',
                                        ),
                                        'items' => array(
                                            array(
                                                'label' => 'Code Promo',
                                                'url' => array('/backoffice/codePromo/index'),
                                            ),
                                            array(
                                                'label' => 'Assurance',
                                                'url' => array('/backoffice/assurance/index'),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    )); */?>
                    <?php /*$this->widget('zii.widgets.CMenu', array(
                    'items'=>array(
                    array('label'=>'Home',   'url'=>array('site/index')),
                    array('label'=>'Products', 'url'=>array('product/index'), 'items'=>array(
                    array('label'=>'New Arrivals', 'url'=>array('product/new')),
                    array('label'=>'Most Popular', 'url'=>array('product/index')),
                    array('label'=>'Another', 'url'=>array('product/index'), 'items'=>array(
                    array('label'=>'Level 3 One', 'url'=>array('product/new')),
                    array('label'=>'Level 3 Two', 'url'=>array('product/index')),
                    array('label'=>'Level 3 Three', 'url'=>array('product/index'), 'items'=>array(
                    array('label'=>'Level 4 One', 'url'=>array('product/new')),
                    array('label'=>'Level 4 Two', 'url'=>array('product/index')),
                    )),
                    )),
                    )),
                    array('label'=>'Login', 'url'=>array('site/login')),
                    ),
                    ));*/?>

                    <?php
/*$this->widget('zii.widgets.CMenu', array(
    'htmlOptions' => array('class' => 'nav navbar-nav'),
    //разрешим HTML-теги в пунктах меню
    'encodeLabel' => false,
    'items' => array(
        array(
            'label' => 'Главная',
            'url' => array(
                '/site/index'
            ),
        ),
        array(
            'label' => 'Статьи',
            'url' => array(
                '/posts/default/index'
            ),
            //подсвечивать этот пункт меню, если мы находимся в модуле posts
            //(например, в списке статей, в подробном описании, ...)
            'active' => (isset(Yii::app()->controller->module->id) && Yii::app()->controller->module->id == 'posts'),
        ),
        array(
            'label' => 'Новости',
            'url' => array(
                '/news/index'
            ),
            //подсвечивать этот пункт меню, если мы находимся в контроллере news
            //(например, в списке новостей, в подробном описании новости, ...)
            'active' => (Yii::app()->controller->id == 'news'),
        ),
        array(
            'label' => 'О нас',
            'url' => array(
                '/site/about'
            ),
        ),
        array(
            'label' => 'Обратная связь',
            'url' => '#',
            //добавим атрибуты к нашей ссылке
            //(для работы bootstrap модального окна)
            'linkOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#fbModal'
            ),
        ),
        array(
            //выводить этот пункт меню только для авторизированного пользователя
            //(так же можно выводить пункты меню в зависимости от прав(ролей) пользователя)
            'visible' => !Yii::app()->user->isGuest,
            //здесь присутствуют html теги
            //(их вывод мы включили с помощью свойства 'encodeLabel' => false)
            'label' => (!empty(Yii::app()->user->title) ? Yii::app()->user->title : '') . ' <span class="caret"></span>',
            'active' => (isset(Yii::app()->controller->module->id) && Yii::app()->controller->module->id == 'user'),
            'url' => '#',
            //установим класс для контейнера подменю
            'submenuOptions' => array(
                'class' => 'dropdown-menu'
            ),
            //установим дополнительные HTML-атрибуты тега <a> для подменю
            'linkOptions' => array(
                'class' => 'dropdown-toggle',
                'data-toggle' => 'dropdown',
                'role' => 'button',
                'aria-haspopup' => 'true',
                'aria-expanded' => 'false'
            ),
            //список пунктов подменю
            'items' => array(
                array(
                    //при необходимости здесь мы можем использовать свойства active, visible и т.д.
                    'label' => 'Профиль',
                    'url' => array(
                        '/user/profile/index'
                    ),
                    //при желании можно добавит еще один уровень меню
                    //'items' => array(),
                ),
                array(
                    'label' => 'Избранное',
                    'url' => array(
                        '/user/favorites/index'
                    ),
                ),
                array(
                    'label' => '',
                    'itemOptions' => array(
                        'role' => 'separator',
                        'class' => 'divider'
                    ),
                ),
                array(
                    'label' => 'Выход',
                        'url' => array(
                            '/site/logout'
                        ),
                    ),
                ),
            ),
        ),
))
;*/?>

                </section>
          <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">

           <!-- Content Header (Page header) -->
           <section class="content-header">
                <h1> <?php echo CHtml::encode($this->pageTitle); ?> </h1>

                <?php if(isset($this->breadcrumbs)):?>
                   <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'tagName'=>'ol',
                    'htmlOptions'=>array('class'=>'breadcrumb'),
                    'homeLink'=>CHtml::tag('li', array(),CHtml::link(Yii::t('app','Home'), array('/admin/default/index')),true),
                    'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                    'inactiveLinkTemplate'=>'<li class="active">{label}</li>',
                    'separator'=>'',
                    )); ?><!-- breadcrumbs -->
                <?php endif?>

            </section>

            <!-- Main content -->
            <section class="content">
                <?php echo $content; ?>
            </section><!-- /.content -->

        </div><!-- /.right-side -->

<?php $this->endContent(); ?>