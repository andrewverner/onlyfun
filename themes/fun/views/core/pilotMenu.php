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
                ['label' => 'Assets', 'url' => ["/pilot/{$app->characterID}/Assets"]],
                ['label' => 'Blueprints', 'url' => ["/pilot/{$app->characterID}/Blueprints"]],
                ['label' => 'Bookmarks', 'url' => ["/pilot/{$app->characterID}/Bookmarks"]],
                ['label' => 'Calendar Events', 'url' => ["/pilot/{$app->characterID}/Events"]],
                ['label' => 'Character Sheet', 'url' => ["/pilot/{$app->characterID}/Sheet"]],
                ['label' => 'Chat channels', 'url' => ["/pilot/{$app->characterID}/Chats"]],
                ['label' => 'Clones', 'url' => ["/pilot/{$app->characterID}/Clones"]],
                ['label' => 'Contact List', 'url' => ["/pilot/{$app->characterID}/Contacts"]],
                ['label' => 'Contracts', 'url' => ["/pilot/{$app->characterID}/Contracts"]],
                ['label' => 'Faction Wars Stats', 'url' => ["/pilot/{$app->characterID}/Wars"]],
                ['label' => 'Industry Jobs', 'url' => ["/pilot/{$app->characterID}/Industry"]],
                ['label' => 'Kill Log', 'url' => ["/pilot/{$app->characterID}/KillLog"]],
                ['label' => 'Kill Mails', 'url' => ["/pilot/{$app->characterID}/KillMail"]],
                ['label' => 'Locations', 'url' => ["/pilot/{$app->characterID}/Locations"]],
                ['label' => 'Mails', 'url' => ["/pilot/{$app->characterID}/Mails"]],
                ['label' => 'Market Orders', 'url' => ["/pilot/{$app->characterID}/Orders"]],
                ['label' => 'Medals', 'url' => ["/pilot/{$app->characterID}/Medals"]],
                ['label' => 'Notifications', 'url' => ["/pilot/{$app->characterID}/Notifications"]],
                ['label' => 'Planetary Colonies', 'url' => ["/pilot/{$app->characterID}/Planetary"]],
                ['label' => 'Research', 'url' => ["/pilot/{$app->characterID}/Research"]],
                ['label' => 'Skills', 'url' => ["/pilot/{$app->characterID}/Skills"]],
                ['label' => 'Standings', 'url' => ["/pilot/{$app->characterID}/Standings"]],
                ['label' => 'Wallet', 'url' => ["/pilot/{$app->characterID}/Wallet"]],
            ]; ?>
            <?php foreach ($items as $item) {
                echo CHtml::link($item['label'], Yii::app()->createUrl($item['url'][0]));
            } ?>
        </div>
    </div>
</div>
