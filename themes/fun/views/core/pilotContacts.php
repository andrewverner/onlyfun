<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 25.11.16
 * Time: 16:11
 *
 * @var $app Application
 * @var $contacts EveXMLCharacterContactList
 * @var $contact EveXMLContact
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
        <div class="row">
            <?php if ($contacts->contactList) : ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Personal contacts</div>
                        <div class="panel-body">
                            <?php foreach ($contacts->contactList as $contact) : ?>
                                <?php echo CHtml::image($contact->image, $contact->contactName, [
                                    'class' => 'img-thumbnail',
                                    'data-toggle' => 'tooltip',
                                    'data-placement' => 'bottom',
                                    'title' => $contact->contactName
                                ]) ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($contacts->corporateContactList) : ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Corporate contacts</div>
                        <div class="panel-body">
                            <?php foreach ($contacts->corporateContactList as $contact) : ?>
                                <?php echo CHtml::image($contact->image, $contact->contactName, [
                                    'class' => 'img-thumbnail',
                                    'data-toggle' => 'tooltip',
                                    'data-placement' => 'bottom',
                                    'title' => $contact->contactName
                                ]) ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($contacts->allianceContactList) : ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Alliance contacts</div>
                        <div class="panel-body">
                            <?php foreach ($contacts->allianceContactList as $contact) : ?>
                                <?php echo CHtml::image($contact->image, $contact->contactName, [
                                    'class' => 'img-thumbnail',
                                    'data-toggle' => 'tooltip',
                                    'data-placement' => 'bottom',
                                    'title' => $contact->contactName
                                ]) ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<pre>
    <?php print_r($contacts) ?>
</pre>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>