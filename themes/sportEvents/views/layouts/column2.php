<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 025 25.11.18
 * Time: 18:56
 */

?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="col-sm-9 content">
    <?= $content; ?>
</section>

<aside class="col-sm-3 sidebar">
    <div class="row">
        <h3>left side</h3>
        <?php
//        var_dump(str_replace('\\', '/',Yii::app()->getBasePath().'/images/slider/all/'));die;
        $this->widget('application.modules.Event.extensions.slider.slider', array(
//        $this->widget('ext.slider.slider', array(
                'container'=>'slideshow',
                'width'=>960,
                'height'=>240,
                'timeout'=>6000,
                'infos'=>true,
                'constrainImage'=>true,
                'imagesPath' => str_replace('\\', '/','/protected/images/slider/all'),
                'images'=>array('01.jpg'),
//                'images'=>array('01.jpg','02.jpg','03.jpg','04.jpg'),
                'alts'=>array('First description','Second description','Third description','Four description'),
                'defaultUrl'=>Yii::app()->request->hostInfo
            )
        );
        ?>
    </div>
</aside>
<?php $this->endContent(); ?>
