<?php
/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 10:50
 */
?>

<div class="character-menu">
    <?php $this->widget('zii.widgets.CMenu',array(
        'items'=>array(
            array('label'=>'Choose another character', 'url'=>array('/select')),
            array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/logout'))
        )
    )); ?>
</div>
<div class="side-panel">
    <table>
        <tr>
            <td>
                <?php echo CHtml::image(
                    Yii::app()->user->character->image(64),
                    Yii::app()->user->character->characterName,
                    [
                        'class' => 'img-circle'
                    ]
                ) ?>
            </td>
            <td class="hello">
                <strong>Hello</strong>,<br />
                <?php echo Yii::app()->user->character->characterName ?>
            </td>
        </tr>
    </table>
    <br />
    <table>
        <tr>
            <td>
                <img
                    src="https://imageserver.eveonline.com/Corporation/<?php echo $character->corporationID ?>_64.png"
                    class="img-circle"
                />
            </td>
            <td class="hello">
                <?php echo $character->corporationName ?>
            </td>
        </tr>
    </table>
    <?php if ($character->allianceID) : ?>
        <br />
        <table>
            <tr>
                <td>
                    <img
                        src="https://imageserver.eveonline.com/Alliance/<?php echo $character->allianceID ?>_64.png"
                        class="img-circle"
                    />
                </td>
                <td class="hello">
                    <?php echo $character->allianceName ?>
                </td>
            </tr>
        </table>
    <?php endif; ?>
</div>
<div class="character-menu">
    <?php $this->widget('zii.widgets.CMenu',array(
        'items'=>array(
            array('label'=>'Home', 'url'=>array('/site/index')),
            array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
            array('label'=>'Contact', 'url'=>array('/site/contact')),
            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
            array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
        )
    )); ?>
</div>
