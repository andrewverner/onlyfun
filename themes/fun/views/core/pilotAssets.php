<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 23.11.16
 * Time: 17:40
 *
 * @var $app Application
 * @var $assets EveXMLCharacterAssets
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
        <?php if ($assets->list && !empty($assets->list)) { ?>
            <?php foreach ($assets->list as $locationID => $data) : ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <?php echo ($data['location'] instanceof SolarSystem) ?
                            $data['location']->solarSystemName :
                            $data['location']->stationName ?>
                    </div>
                    <div class="panel-body">
                        <table class="table-api">
                            <?php foreach ($data['items'] as $itemID => $itemData) : ?>
                                <tr>
                                    <td><?php echo CHtml::image(EveHelper::image($itemData['item']->typeID, 32, EveHelper::IMAGE_TYPE_TYPE)) ?></td>
                                    <td><?php echo $itemData['item']->name ?></td>
                                    <td><?php echo $itemData['item']->quantity ?></td>
                                </tr>
                                <?php if (isset($itemData['nested'])) : ?>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">Nested</div>
                                                <div class="panel-body">
                                                    <table class="table-api">
                                                        <?php foreach ($itemData['nested'] as $nested) : ?>
                                                            <tr>
                                                                <td><?php echo CHtml::image(EveHelper::image($nested->typeID, 32, EveHelper::IMAGE_TYPE_TYPE)) ?></td>
                                                                <td><?php echo $nested->name ?></td>
                                                                <td><?php echo $nested->quantity ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php } else { ?>
            <div class="alert alert-info">Character doesn't have any assets</div>
        <?php } ?>
    </div>
</div>
<pre>
    <?php print_r($assets) ?>
</pre>