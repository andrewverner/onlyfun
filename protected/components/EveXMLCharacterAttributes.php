<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 1:55
 */

class EveXMLCharacterAttributes
{

    public $intelligence;
    public $memory;
    public $charisma;
    public $perception;
    public $willpower;

    public function __construct($xml)
    {
        $this->intelligence = intval($xml->intelligence);
        $this->memory       = intval($xml->memory);
        $this->charisma     = intval($xml->charisma);
        $this->perception   = intval($xml->perception);
        $this->willpower    = intval($xml->willpower);
        return $this;
    }

}
