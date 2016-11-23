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
        $this->bookmarkID   = $row['bookmarkID'];
        $this->creatorID    = $row['creatorID'];
        $this->created      = $row['created'];
        $this->itemID       = $row['itemID'];
        $this->typeID       = $row['typeID'];
        $this->locationID   = $row['locationID'];
        $this->x            = $row['x'];
        $this->y            = $row['y'];
        $this->z            = $row['z'];
        $this->memo         = $row['memo'];
        $this->note         = $row['note'];

        return $this;
    }

}
