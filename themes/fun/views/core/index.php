<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 1:24
 *
 * @var $character EveXMLCharacterSheet
 * @var $corporation EveXMLPublicCorporationSheet
 */
?>

<div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 no-padding">
        <?php $this->renderPartial('//core/leftPanel', ['character' => $character]) ?>
    </div>
    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="api-menu hidden-xs">
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
                <div class="mobile-api-menu hidden-lg hidden-md hidden-sm">
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
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">General information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <strong>Name</strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <?php echo Yii::app()->user->character->characterName ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <strong>Race</strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <?php echo $character->race ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <strong>Blood Line</strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <?php echo $character->bloodLine ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <strong>Ancestry</strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <?php echo $character->ancestry ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <strong>Corporation Name</strong>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <?php echo $character->corporationName ?>
                            </div>
                        </div>
                        <?php if ($character->allianceName) : ?>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <strong>Alliance Name</strong>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <?php echo $character->allianceName ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Corporation</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4">
                                    <?php echo CHtml::image($corporation->image(128), $corporation->corporationName) ?>
                                    <br /><br />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                                    <strong>Name</strong><br />
                                    <?php echo $corporation->corporationName ?> [<?php echo $corporation->ticker ?>]<br /><br />
                                    <strong>CEO</strong><br />
                                    <?php echo $corporation->ceoName ?><br /><br />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <strong>Tax</strong><br />
                                        <?php echo $corporation->taxRate ?>%    <br /><br />
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <strong>Member count</strong><br />
                                        <?php echo $corporation->memberCount ?><br /><br />
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <strong>Shares</strong><br />
                                        <?php echo $corporation->shares ?><br /><br />
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <strong>Url</strong><br />
                                        <?php echo $corporation->httpUrl ?><br /><br />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="corp-description">
                                    <?php echo strip_tags($corporation->description, '<br>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<pre>
    <?php print_r($corporation) ?>
    <?php print_r($character) ?>
</pre>