<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 1:12
 */
class EmploymentHistoryRecord
{

    public $recordID;
    public $corporationID;
    public $corporationName;
    public $startDate;

    public function __construct($row)
    {
        $this->recordID = strval($row['recordID']);
        $this->corporationID = strval($row['corporationID']);
        $this->corporationName = strval($row['corporationName']);
        $this->startDate = strval($row['startDate']);
    }

}
