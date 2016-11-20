<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 3:18
 */

class EveXMLCharacterImplant extends EveType
{

    public $implantName;
    public $typeID;

    public function __construct($row)
    {
        $this->implantName = strval($row['typeName']);
        $this->typeID = intval($row['typeID']);
    }

}
