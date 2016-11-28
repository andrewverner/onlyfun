<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 28.11.16
 * Time: 14:57
 *
 * @var $app Application
 * @var $locations EveXMLCharacterLocations
 * @var $location EveXMLLocation
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
        <?php if ($locations && !empty($locations->list)) { ?>
            <table class="table-api">
            <?php foreach ($locations->list as $location) : ?>
                <tr>
                    <td><?php echo $location->itemID ?></td>
                    <td><?php echo $location->itemName ?></td>
                    <td><?php echo $location->x ?></td>
                    <td><?php echo $location->y ?></td>
                    <td><?php echo $location->z ?></td>
                </tr>
            <?php endforeach; ?>
            </table>
        <?php } else { ?>
            <div class="alert alert-info">Character doesn't have any locations</div>
        <?php } ?>
    </div>
</div>

<pre>
    <?php print_r($locations) ?>
</pre>
