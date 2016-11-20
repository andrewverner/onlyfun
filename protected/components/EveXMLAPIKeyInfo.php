<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 0:00
 */

class EveXMLAPIKeyInfo
{

    public $assessMask;
    public $expires;
    public $characters;

    public function __construct($xml)
    {
        $this->assessMask = strval($xml->key['accessMask']);
        $this->expires = strval($xml->key['expires']);

        $this->characters = [];
        foreach ($xml->key->rowset[0] as $row) {
            $this->characters[] = new EveXMLAccountCharacter($row);
        }
    }

}
