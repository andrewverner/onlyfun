<?php

/**
 * Created by PhpStorm.
 * User: verner
 * Date: 20.11.16
 * Time: 20:57
 */

class ErrorObject
{

    public $description;

    public function __construct($description)
    {
        $this->description = $description;
        return $this;
    }

}
