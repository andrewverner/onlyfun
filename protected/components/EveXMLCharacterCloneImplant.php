<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 3:15
 */

class EveXMLCharacterCloneImplant
{

    public $cloneID;
    public $implantName;
    public $typeID;

    public function __construct($row)
    {
        $this->cloneID = intval($row['jumpCloneID']);
        $this->implantName = strval($row['typeName']);
        $this->typeID = intval($row['typeID']);
    }

}
