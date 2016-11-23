<?php

/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 23.11.2016
 * Time: 20:41
 */

class EveXMLAccountBalace extends EveXMLApi
{

    public $balance;

    public function __construct($keyID, $vCode, $characterID)
    {
        $this->url = '/char/AccountBalance.xml.aspx';

        $this->params = http_build_query([
            'keyID' => $keyID,
            'vCode' => $vCode,
            'characterID' => $characterID
        ]);

        if ($xml = $this->send()) {
            $this->balance = floatval($xml->rowset[0]->row['balance']);
        }
        else
            return false;
    }

}
