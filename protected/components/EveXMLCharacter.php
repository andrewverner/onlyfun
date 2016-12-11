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
    
    public function getAccountBalance()
    {
        return new EveXMLAccountBalace($this->_keyID, $this->_vCode, $this->_characterID);
    }

    public function getSheet()
    {
        return new EveXMLCharacterSheet($this->_keyID, $this->_vCode, $this->_characterID);
    }

    public function getBlueprints()
    {
        return new EveXMLCharacterBlueprints($this->_keyID, $this->_vCode, $this->_characterID);
    }

    public function getBookmarks()
    {
        return new EveXMLCharacterBookmarks($this->_keyID, $this->_vCode, $this->_characterID);
    }

    public function getChatChannels()
    {
        return new EveXMLCharacterChatChannels($this->_keyID, $this->_vCode, $this->_characterID);
    }

    public function getCalendarEvents()
    {
        return new EveXMLCharacterUpcomingCalendarEvents($this->_keyID, $this->_vCode, $this->_characterID);
    }

    public function getContactList()
    {
        return new EveXMLCharacterContactList($this->_keyID, $this->_vCode, $this->_characterID);
    }

    public function getLocations()
    {
        return new EveXMLCharacterLocations($this->_keyID, $this->_vCode, $this->_characterID, true);
    }

    public function getSkills()
    {
        return new EveXMLCharacterSkills($this->_keyID, $this->_vCode, $this->_characterID);
    }

    public function getAssets()
    {
        return new EveXMLCharacterAssets($this->_keyID, $this->_vCode, $this->_characterID);
    }

}
