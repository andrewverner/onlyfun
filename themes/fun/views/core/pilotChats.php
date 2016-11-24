<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 24.11.16
 * Time: 16:13
 *
 * @var $chats EveXMLCharacterChatChannels
 * @var $chat EveXMLChatChannel
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
        <?php if ($chats && !empty($chats->list)) { ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php foreach ($chats->list as $chat) : ?>

                    <?php endforeach; ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="alert alert-info">Character doesn't have any chat channels</div>
        <?php } ?>
    </div>
</div>
<pre>
    <?php print_r($chats) ?>
</pre>
