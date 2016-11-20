<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 3:34
 */

class EveXMLCharacterCorporationTitle
{

    public $titleName;
    public $titleID;

    public function __construct($row)
    {
        $this->titleName = strval($row['titleName']);
        $this->titleID = strval($row['titleID']);
    }

}
