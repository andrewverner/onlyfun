<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 01.12.16
 * Time: 14:22
 */

class EveXMLAsset
{

    public $itemID;
    //public $locationID;
    public $typeID;
    public $quantity;
    public $flag;
    public $singleton;
    public $rawQuantity;
    public $name;

    public function __construct($row)
    {
        $this->itemID       = intval($row['itemID']);
        //$this->locationID   = intval($row['locationID']);
        $this->typeID       = intval($row['typeID']);
        $this->quantity     = intval($row['quantity']);
        $this->flag         = intval($row['flag']);
        $this->singleton    = intval($row['singleton']);
        $this->rawQuantity  = intval($row['rawQuantity']);

        $this->name = InvTypes::model()->findByPk($this->typeID)->getAttribute('typeName');
    }

}
