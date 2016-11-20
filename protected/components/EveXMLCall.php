<?php

/**
 * Created by PhpStorm.
 * User: verner
 * Date: 20.11.16
 * Time: 20:53
 */

class EveXMLCall
{

    public $name;
    public $accessMask;
    public $description;
    public $granted = false;

    public function __construct($row)
    {
        $this->name = strval($row['name']);
        $this->accessMask = intval($row['accessMask']);
        $this->description = strval($row['description']);
    }

}
