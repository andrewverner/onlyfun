<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 28.11.16
 * Time: 16:49
 */

class EveXMLSkill
{

    public $typeID;
    public $typeName;
    public $skillpoints;
    public $level;
    public $published;

    public function __construct($row)
    {
        $this->typeID = intval($row['typeID']);
        $this->typeName = strval($row['typeName']);
        $this->skillpoints = intval($row['skillpoints']);
        $this->level = intval($row['level']);
        $this->published = intval($row['published']);
    }

}
