<?php

/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 23.11.2016
 * Time: 21:06
 */

class EveXMLBookmark
{

    public $bookmarkID;
    public $creatorID;
    public $created;
    public $itemID;
    public $typeID;
    public $locationID;
    public $x;
    public $y;
    public $z;
    public $memo;
    public $note;

    public function __construct($row)
    {
        $this->bookmarkID   = intval($row['bookmarkID']);
        $this->creatorID    = intval($row['creatorID']);
        $this->created      = strval($row['created']);
        $this->itemID       = intval($row['itemID']);
        $this->typeID       = intval($row['typeID']);
        $this->locationID   = intval($row['locationID']);
        $this->x            = floatval($row['x']);
        $this->y            = floatval($row['y']);
        $this->z            = floatval($row['z']);
        $this->memo         = strval($row['memo']);
        $this->note         = strval($row['note']);

        return $this;
    }

}
