<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 28.11.16
 * Time: 16:42
 *
 * @var $app Application
 * @var $skills EveXMLCharacterSkills
 * @var $skill EveXMLSkill
 * @var $queueSkill EveXMLQueueSkill
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
        <?php if ($skills && !empty($skills->list)) { ?>
            <div class="panel panel-primary">
                <div class="panel-heading">Skills</div>
                <div class="panel-body">
                    <?php foreach ($skills->list as $groupName => $list) : ?>
                        <?php if (!empty($list)) : ?>
                        <?php ksort($list) ?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h4><strong><?php echo $groupName ?></strong></h4>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($list as $skill) : ?>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
                                    <?php echo CHtml::image("/images/skills/level{$skill->level}.gif") ?>
                                    <?php echo $skill->typeName ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if ($skills->queue && !empty($skills->queue->list)) : ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">Skill queue</div>
                    <div class="panel-body">
                        <table class="table-api">
                        <?php foreach ($skills->queue->list as $queueSkill) : ?>
                            <tr>
                                <td><?php echo $queueSkill->queuePosition ?></td>
                                <td><?php echo $queueSkill->typeID ?></td>
                                <td><?php echo $queueSkill->typeName ?></td>
                                <td><?php echo $queueSkill->level ?></td>
                                <td><?php echo $queueSkill->startSP ?></td>
                                <td><?php echo $queueSkill->endSP ?></td>
                                <td><?php echo $queueSkill->startTime ?></td>
                                <td><?php echo $queueSkill->endTime ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        <?php } else { ?>

        <?php } ?>
    </div>
</div>

<pre>
    <?php print_r($skills) ?>
</pre>