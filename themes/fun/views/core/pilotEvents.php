<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 24.11.16
 * Time: 16:20
 *
 * @var $events EveXMLCharacterUpcomingCalendarEvents
 * @var $event EveXMLCalendarEvent
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
        <?php if ($events && !empty($events->list)) { ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php foreach ($events->list as $event) : ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php echo $event->eventTitle ?>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <table class="table-api">
                                            <tr>
                                                <td><strong>Event ID</strong></td><td><?php echo $event->eventID ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Owner ID</strong></td><td><?php echo $event->ownerID ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Owner name</strong></td><td><?php echo $event->ownerName ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Date</strong></td><td><?php echo $event->eventDate ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Duration</strong></td><td><?php echo $event->duration ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Importance</strong></td><td><?php echo $event->importance ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Response</strong></td><td><?php echo $event->response ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <table class="table-api">
                                            <tr>
                                                <td>
                                                    <?php echo $event->eventText ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="alert alert-info">Character doesn't have any chat channels</div>
        <?php } ?>
    </div>
</div>
<pre>
    <?php print_r($events) ?>
</pre>

