<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 025 25.11.18
 * Time: 18:56
 */
//var_dump($this);
?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="col-sm-9 content">
<!--    --><?php //var_dump(__FILE__)?>
    <?= $content; ?>
</section>

<aside class="col-sm-3 sidebar">
    <div class="row">
        <h3>left side</h3>
    </div>
</aside>
<?php $this->endContent(); ?>
