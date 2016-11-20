<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 1:20
 */

class WebCharacter
{

    public $characterID;
    public $characterName;
    public $corporationID;
    public $corporationName;
    public $allianceID;
    public $allianceName;
    public $keyID;
    public $vCode;
    public $isCeo;

    public function __construct($character, $isCeo)
    {
        /**
         * @var $character EveXMLPublicCharacterInfo
         */
        $this->characterID = $character->characterID;
        $this->corporationID = $character->corporationID;
        $this->corporationName = $character->corporation;
        $this->alianceID = $character->allianceID;
        $this->allianceName = $character->alliance;

        $model = Character::model()->findByAttributes([
            'characterID' => $character->characterID,
            'userID' => Yii::app()->user->id
        ]);

        $this->characterName = $model->characterName;
        $this->keyID = $model->keyID;
        $this->vCode = $model->vCode;

        $this->isCeo = $isCeo;
        return $this;
    }

    public function image($size)
    {
        return "https://imageserver.eveonline.com/Character/{$this->characterID}_{$size}.jpg";
    }

}
