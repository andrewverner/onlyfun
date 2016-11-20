<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 19.11.16
 * Time: 23:38
 */
class EveXMLAccount extends EveXMLApi
{

    private $_keyID;
    private $_vCode;

    public function __construct($keyID, $vCode)
    {
        $this->_keyID = $keyID;
        $this->_vCode = $vCode;

        $this->params = http_build_query([
            'keyID' => $this->_keyID,
            'vCode' => $this->_vCode
        ]);
    }

    public function accountStatus()
    {
        $this->url = "/account/AccountStatus.xml.aspx";

        if ($xml = $this->send()) {
            return new EveXMLAccountStatus($xml);
        }
        else
            return false;
    }

    public function apiKeyInfo()
    {
        $this->url = "/account/APIKeyInfo.xml.aspx";

        if ($xml = $this->send()) {
            return new EveXMLAPIKeyInfo($xml);
        }
        else
            return false;
    }

    public function characters()
    {

    }

}
