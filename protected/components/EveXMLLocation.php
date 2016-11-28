<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 28.11.16
 * Time: 14:46
 */

class EveXMLLocation
{

    public $itemID;
    public $itemName;
    public $x;
    public $y;
    public $z;

    public function __construct($row)
    {
        $this->itemID   = intval($row['itemID']);
        $this->itemName = strval($row['itemName']);
        $this->x        = intval($row['x']);
        $this->y        = intval($row['y']);
        $this->z        = intval($row['z']);

        return $this;
    }

}
