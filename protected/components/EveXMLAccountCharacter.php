<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 19.11.16
 * Time: 23:35
 */
class EveXMLAccountCharacter extends Character
{

    public $name;
    public $characterID;
    public $corporationName;
    public $corporationID;
    public $allianceID;
    public $allianceName;

    public function __construct($row)
    {
        $this->name = strval($row['characterName']);
        $this->characterID = strval($row['characterID']);
        $this->corporationName = strval($row['corporationName']);
        $this->corporationID = strval($row['corporationID']);
        $this->allianceID = strval($row['allianceID']);
        $this->allianceName = strval($row['allianceName']);
    }

}
