<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 23.11.16
 * Time: 16:41
 *
 * @var $app Application
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
        <pre>
            <?php print_r($sheet) ?>
        </pre>
    </div>
</div>
