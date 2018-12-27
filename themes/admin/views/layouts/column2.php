<?php $this->beginContent('//layouts/main'); ?>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

             <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo Yii::app()->getUser()->getAvatar()?>" class="img-circle" alt="User Image" />
<!--                            <img src="--><?php //echo $this->mainAssets.'/dist/img/avatar04.png'?><!--" class="img-circle" alt="User Image" />-->
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
                                array('label'=>Menu::link('Організатори', 'fa fa-book'), 'url'=>array('/admin/organizers/index')),
                                array('label'=>Menu::link('Забіги', 'fa fa-bicycle'), 'url'=>array('/admin/races/index')),
                                array('label'=>Menu::link('Учасники', 'fa fa-child'), 'url'=>array('/admin/members/index')),
                                array('label'=>Menu::link('Платежі', 'fa fa-money'), 'url'=>array('/admin/payment')),
//                                array('label'=>Menu::link('Promo codes', 'fa running'), 'url'=>array('/admin/promoCodes/index')),
//                                array('label'=>Menu::link('Payments', 'fa running'), 'url'=>array('/backend/payment/payment')),
                                array('label'=>Menu::link('Типи забігів', 'fa fa-gittip'), 'url'=>array('/admin/raceTypes')),
//                                array('label'=>Menu::link('Вікові категорії', 'fa fa-user-secret'), 'url'=>array('/admin/raceAges')),
                                array('label'=>Menu::link('Зображеня', 'fa fa-cc-discover'), 'url'=>array('/backend/image/image/')),
                                array('label'=>Menu::link('Налаштування слайдера', 'fa fa-cc-discover'), 'url'=>array('/admin/slider')),
                            ),
                    )); ?>

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