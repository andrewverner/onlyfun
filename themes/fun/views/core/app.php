<?php
/**
 * Created by PhpStorm.
 * User: verner
 * Date: 20.11.16
 * Time: 23:44
 *
 * @var $validator          EveXMLAPIKeyValidator
 * @var $keyInfo            EveXMLAPIKeyInfo
 * @var $app                Application
 * @var $error              ErrorObject
 * @var $accountCharacter   EveXMLAccountCharacter
 */

$character = Yii::app()->user->character;
?>

<div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 no-padding">
        <?php $this->renderPartial('//core/leftPanel', ['character' => $character]) ?>
    </div>
    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 text-center">
        <?php if (!$validator->errors()) { ?>
            <?php foreach ($keyInfo->characters as $accountCharacter) : ?>
                <a href="javascript:void(0);" data-id="<?php echo $app->id ?>">
                    <div class="character-select">
                        <?php echo CHtml::image($accountCharacter->image(128), $accountCharacter->name, [
                            'class' => 'img-thumbnail'
                        ]) ?>
                        <div><?php echo $accountCharacter->name ?></div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php } else { ?>
            <h2>API Key Error:</h2><br />
            <?php foreach ($validator->errors as $error) : ?>
                <div class="alert alert-danger">
                    <?php echo $error->description ?>
                </div>
            <?php endforeach; ?>
        <?php } ?>
    </div>
</div>
