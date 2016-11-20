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
    public $keyID;
    public $vCode;
    public $isCeo;

    public function __construct($id, $isCeo)
    {
        $this->characterID = $id;

        $model = Character::model()->findByAttributes([
            'characterID' => $id,
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
