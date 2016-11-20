<?php

/**
 * Created by PhpStorm.
 * User: verner
 * Date: 20.11.16
 * Time: 19:34
 */
class EveType
{

    public $typeID;

    public function image($size)
    {
        return "https://imageserver.eveonline.com/Type/{$this->typeID}_{$size}.png";
    }

}
