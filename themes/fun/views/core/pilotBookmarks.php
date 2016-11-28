<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 24.11.16
 * Time: 11:24
 *
 * @var $bookmarks EveXMLCharacterBookmarks
 * @var $bookmark EveXMLBookmark
 */
?>

<div class="row">
    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 no-padding">
        <?php $this->renderPartial('//core/leftPanel') ?>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 no-padding bg-white">
        <?php $this->renderPartial('//core/pilotMenu', ['app' => $app]) ?>
    </div>
    <div class="col-lg-8 col-md-7 col-sm-6 col-xs-12">
        <?php if ($bookmarks && !empty($bookmarks->list)) { ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php foreach ($bookmarks->list as $folderName => $list) : ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php echo ($folderName) ? $folderName : 'System folder' ?>
                            </div>
                            <div class="panel-body">
                                <table class="table-api">
                                    <thead>
                                        <tr>
                                            <td>bookmarkID</td>
                                            <td>creator</td>
                                            <td>created</td>
                                            <td>location</td>
                                            <td>x</td>
                                            <td>y</td>
                                            <td>z</td>
                                            <td>memo</td>
                                            <td>note</td>
                                        </tr>    
                                    </thead>
                                    <tbody>
                                        <?php foreach ($list as $bookmark) : ?>
                                            <tr>
                                                <td><?php echo $bookmark->bookmarkID ?></td>
                                                <td>
                                                    <?php if ($bookmark->creatorID) : ?>
                                                        <?php echo $bookmarks->creators[$bookmark->creatorID]->characterName ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo $bookmark->created ?></td>
                                                <td>
                                                    <?php if ($bookmark->locationID && isset($bookmarks->locations[$bookmark->locationID])) : ?>
                                                        <?php echo $bookmarks->locations[$bookmark->locationID]->solarSystemName ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo $bookmark->x ?></td>
                                                <td><?php echo $bookmark->y ?></td>
                                                <td><?php echo $bookmark->z ?></td>
                                                <td><?php echo $bookmark->memo ?></td>
                                                <td><?php echo $bookmark->note ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="alert alert-info">Character doesn't have any blueprints</div>
        <?php } ?>
    </div>
</div>
<pre>
    <?php print_r($bookmarks) ?>
</pre>
