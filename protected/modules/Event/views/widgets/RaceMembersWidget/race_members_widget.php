<?php
/**
 * Created by PhpStorm.
 * User: Serdg
 * Date: 004 04.12.18
 * Time: 1:31
 *
 * @var EventMembers[] $members
 */
?>
<!--<h3>RaceMembersWidget</h3>-->
<table class="table table-hover">
    <thead>
    <tr>
        <th><?=Yii::t('EventModule.race', 'Стартовий номер')?></th>
        <th><?=Yii::t('EventModule.race', 'Ім\'я')?></th>
        <th><?=Yii::t('EventModule.race', 'Стать')?></th>
        <th><?=Yii::t('EventModule.race', 'Рік народження')?></th>
        <th><?=Yii::t('EventModule.race', 'Вікова категорія')?></th>
        <th><?=Yii::t('EventModule.race', 'Місто')?></th>
        <th><?=Yii::t('EventModule.race', 'Клуб')?></th>
    </tr>
    </thead>
    <tbody>

        <?php if (!empty($members)) :?>
            <?php foreach ($members as $member):?>
                <tr>
                    <td><?=$member->start_number?></td>
                    <td><?=sprintf('%s %s', ucfirst($member->last_name), ucfirst($member->first_name));?></td>
                    <td><?=$member->getSex()?></td>
                    <td><?=$member->getYear()?></td>
                    <td><?=$member->getAge()?></td>
                    <td><?=$member->city?></td>
                    <td><?=$member->club?></td>
                </tr>
            <?php endforeach?>
        <?php endif;?>

    </tbody>
</table>