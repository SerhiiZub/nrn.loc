<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 025 25.11.18
 * Time: 17:11
 */

//var_dump($models);
?>
<?php //var_dump($this)?>

<ul class="list-unstyled">
    <?php foreach ($models as $model): ?>
    <li>
        <h3><?php echo $model->name?></h3>
        <p>
            <?php echo $model->description?>
        </p>
    </li>
    <hr/>
    <?php endforeach; ?>
</ul>
