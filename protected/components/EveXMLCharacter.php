<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 1:36
 */

class EveXMLCharacter
{

    private $_keyID;
    private $_vCode;
    private $_characterID;

    public function __construct($keyID, $vCode, $characterID)
    {
        $this->_keyID = $keyID;
        $this->_vCode = $vCode;
        $this->_characterID = $characterID;
    }

    public function getSheet()
    {
        return new EveXMLCharacterSheet($this->_keyID, $this->_vCode, $this->_characterID);
    }

    public function getBlueprints()
    {
        return new EveXMLCharacterBlueprints($this->_keyID, $this->_vCode, $this->_characterID);
    }

}
