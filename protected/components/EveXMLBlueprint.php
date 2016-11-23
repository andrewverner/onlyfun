<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 23.11.16
 * Time: 17:15
 */

class EveXMLBlueprint
{

    public $runs;
    public $materialEfficiency;
    public $timeEfficiency;
    public $quantity;
    public $flagID;
    public $typeName;
    public $typeID;
    public $locationID;
    public $itemID;
    public $type;

    public function __construct($row)
    {
        $this->runs                 = intval($row['runs']);
        $this->materialEfficiency   = intval($row['materialEfficiency']);
        $this->timeEfficiency       = intval($row['timeEfficiency']);
        $this->quantity             = intval($row['quantity']);
        $this->flagID               = intval($row['flagID']);
        $this->typeName             = strval($row['typeName']);
        $this->typeID               = intval($row['typeID']);
        $this->locationID           = intval($row['locationID']);
        $this->itemID               = intval($row['itemID']);
        $this->type                 = ($this->quantity == -1) ? 'Original' : 'Copy';
    }

}
