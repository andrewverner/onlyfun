<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 28.11.16
 * Time: 16:57
 */

class EveXMLCharacterSkillInTraining extends EveXMLApi
{

    public $trainingEndTime;
    public $trainingStartTime;
    public $trainingTypeID;
    public $trainingStartSP;
    public $trainingDestinationSP;
    public $trainingToLevel;
    public $skillInTraining;

    public $skillName;

    public function __construct($keyID, $vCode, $characterID, $simulate = false)
    {
        $this->url = '/char/SkillInTraining.xml.aspx';

        $this->params = http_build_query([
            'keyID'         => $keyID,
            'vCode'         => $vCode,
            'characterID'   => $characterID
        ]);
        $this->simulate = $simulate;

        if ($xml = $this->send()) {
            $this->trainingEndTime          = strval($xml->trainingEndTime);
            $this->trainingStartTime        = strval($xml->trainingStartTime);
            $this->trainingTypeID           = intval($xml->trainingTypeID);
            $this->trainingStartSP          = intval($xml->trainingStartSP);
            $this->trainingDestinationSP    = intval($xml->trainingDestinationSP);
            $this->trainingToLevel          = intval($xml->trainingToLevel);
            $this->skillInTraining          = intval($xml->skillInTraining);

            $this->skillName = InvTypes::model()->findByAttributes(['typeID' => $this->trainingTypeID])->getAttribute('typeName');
        }
        else
            return false;
    }

}
