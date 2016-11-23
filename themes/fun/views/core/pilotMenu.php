<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 23.11.16
 * Time: 17:41
 *
 * @var $app Application
 */
?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <?php echo CHtml::image(
            EveHelper::image($app->characterID, 128),
            $app->character->characterName,
            [
                'class' => 'img-thumbnail'
            ]
        ) ?>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pilot-name">
        <?php echo $app->character->characterName ?>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="api-pilot-menu">
            <?php $items = [
                ['label' => 'Assets', 'url' => ['/site/index']],
                ['label' => 'Blueprints', 'url' => ['/site/index']],
                ['label' => 'Bookmarks', 'url' => ['/site/index']],
                ['label' => 'Calendar Events', 'url' => ['/site/index']],
                ['label' => 'Character Sheet', 'url' => ['/site/index']],
                ['label' => 'Chat channels', 'url' => ['/site/index']],
                ['label' => 'Clones', 'url' => ['/site/index']],
                ['label' => 'Contact List', 'url' => ['/site/index']],
                ['label' => 'Contracts', 'url' => ['/site/index']],
                ['label' => 'Faction Wars Stats', 'url' => ['/site/index']],
                ['label' => 'Industry Jobs', 'url' => ['/site/index']],
                ['label' => 'Kill Log', 'url' => ['/site/index']],
                ['label' => 'Kill Mails', 'url' => ['/site/index']],
                ['label' => 'Locations', 'url' => ['/site/index']],
                ['label' => 'Mails', 'url' => ['/site/index']],
                ['label' => 'Market Orders', 'url' => ['/site/index']],
                ['label' => 'Medals', 'url' => ['/site/index']],
                ['label' => 'Notifications', 'url' => ['/site/index']],
                ['label' => 'Planetary Colonies', 'url' => ['/site/index']],
                ['label' => 'Research', 'url' => ['/site/index']],
                ['label' => 'Skills', 'url' => ['/site/index']],
                ['label' => 'Standings', 'url' => ['/site/index']],
                ['label' => 'Upcoming Calendar Events', 'url' => ['/site/index']],
                ['label' => 'Wallet', 'url' => ['/site/index']],
            ]; ?>
            <?php foreach ($items as $item) {
                echo CHtml::link($item['label'], Yii::app()->createUrl($item['url'][0]));
            } ?>
        </div>
    </div>
</div>
