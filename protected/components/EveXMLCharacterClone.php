<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 2:47
 */

class EveXMLCharacterClone
{

    public $cloneType;
    public $cloneID;
    //@todo
    public $location;

    public function __construct($row)
    {
        $typeID = intval($row['typeID']);
        $type = (new EveXMLTypeName($typeID))->typeName;
        $this->cloneType = ($type) ? $type : "typeID {$typeID}";
        $this->cloneID = intval($row['jumpCloneID']);
        return $this;
    }

}
