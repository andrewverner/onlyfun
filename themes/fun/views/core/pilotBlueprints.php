<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 23.11.16
 * Time: 17:40
 *
 * @var $app Application
 * @var $blueprints EveXMLCharacterBlueprints
 * @var $blueprint EveXMLBlueprint
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
        <?php if ($blueprints && !empty($blueprints->list)) { ?>
            <div class="row">
            <?php foreach ($blueprints->list as $blueprint) : ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <?php echo $blueprint->typeName ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-4 text-center">
                                    <?php echo CHtml::image(EveHelper::image($blueprint->typeID, 64, EveHelper::IMAGE_TYPE_TYPE)) ?>
                                </div>
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8 text-center">
                                    <strong>Type / runs</strong>: <?php echo $blueprint->type ?> / <?php echo $blueprint->runs ?><br />
                                    <strong>Material efficiency</strong>: <?php echo $blueprint->materialEfficiency ?><br />
                                    <strong>Time efficiency</strong>: <?php echo $blueprint->timeEfficiency ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        <?php } else { ?>
            <div class="alert alert-info">Character doesn't have any blueprints</div>
        <?php } ?>
    </div>
</div>
<pre>
    <?php print_r($blueprints) ?>
</pre>