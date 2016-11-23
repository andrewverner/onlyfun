<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 19.11.16
 * Time: 23:12
 */
class AddAPIKeyForm extends CFormModel
{

    public $keyID;
    public $vCode;

    public function rules()
    {
        return [
            ['keyID, vCode', 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'keyID' => Yii::t('form', 'keyID'),
            'vCode' => Yii::t('form', 'vCode'),
        ];
    }

    public function execute()
    {
        $account = new EveXMLAccount($this->keyID, $this->vCode);
        $apiKeyInfo = $account->apiKeyInfo();

        if ($apiKeyInfo) {
            /**
             * @var $character EveXMLAccountCharacter
             */
            foreach ($apiKeyInfo->characters as $character) {
                $model = Character::model()->findByAttributes([
                    'characterID'   => $character->characterID,
                    'userID'        => Yii::app()->user->id
                ]);

                if (!$model) $model = new Character();

                $model->setAttributes([
                    'userID'        => Yii::app()->user->id,
                    'characterName' => $character->name,
                    'characterID'   => $character->characterID,
                    'keyID'         => $this->keyID,
                    'vCode'         => $this->vCode
                ]);
                $model->save();
            }
        }
        else
            return false;
    }

}