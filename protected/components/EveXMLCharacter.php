<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 1:36
 */

class EveXMLCharacter extends EveXMLApi
{

    public function __construct($keyID, $vCode, $characterID)
    {
        $this->params = http_build_query([
            'keyID'         => $keyID,
            'vCode'         => $vCode,
            'characterID'   => $characterID
        ]);
    }

}
