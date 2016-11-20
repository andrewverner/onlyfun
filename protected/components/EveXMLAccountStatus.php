<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 19.11.16
 * Time: 23:48
 */

class EveXMLAccountStatus
{

    public $paidUntil;
    public $createDate;
    public $logonCount;
    public $logonMinutes;
    public $logonHours;
    public $logonDays;

    public function __construct($xml)
    {
        $this->paidUntil = strval($xml->paidUntil);
        $this->createDate = strval($xml->createDate);
        $this->logonCount = intval($xml->logonCount);
        $this->logonMinutes = intval($xml->logonMinutes);
        $this->logonHours = ceil($this->logonMinutes/60);
        $this->logonDays = ceil($this->logonHours/24);
    }

}
