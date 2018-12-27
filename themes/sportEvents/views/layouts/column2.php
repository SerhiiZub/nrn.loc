<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 025 25.11.18
 * Time: 18:56
 */
//var_dump();die;
$slides = EventSlider::getSlides();
?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="col-sm-9 content">
    <?= $content; ?>
</section>

<aside class="col-sm-3 sidebar">
    <div class="row">
        <?php
        $this->widget('application.modules.Event.extensions.slider.slider', array(
//        $this->widget('ext.slider.slider', array(
                'container'=>'slideshow',
                'width'=>'100%',
                'height'=>440,
                'timeout'=>6000,
                'infos'=>true,
                'constrainImage'=>true,
                'sliderBase' => '',
//                'sliderBase' => $this->mainAssets,
                'imagesPath' => '/uploads/image',
                'sameToAll' => true,
//                'images'=>array('01.jpg'),
//                'images'=>array('addd87d40a29049d3b92f2935c54569d.png'),
                'images'=>$slides['images'],
//                'images'=>array('87616c9eed5d63a92a69bd1a72351b6c.jpg'),
//                'images'=>array('01.jpg','02.jpg','03.jpg','04.jpg'),
                'alts'=>$slides['alts'],
//                'alts'=>array('First description','Second description','Third description','Four description'),
                'urls'=>$slides['urls'],
//                'urls'=>['/events/', '/races/', '/profile'],
                'defaultUrl'=>Yii::app()->request->hostInfo
            )
        );
        ?>
    </div>
</aside>
<?php $this->endContent(); ?>
