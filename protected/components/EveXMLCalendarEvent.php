<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 24.11.16
 * Time: 16:08
 */

class EveXMLCalendarEvent
{

    public $eventID;
    public $ownerID;
    public $ownerName;
    public $eventDate;
    public $eventTitle;
    public $duration;
    public $importance;
    public $response;
    public $eventText;
    //@todo
    public $attendees;

    public function __construct($row)
    {
        $this->eventID      = intval($row['eventID']);
        $this->ownerID      = intval($row['ownerID']);
        $this->ownerName    = strval($row['ownerName']);
        $this->eventDate    = strval($row['eventDate']);
        $this->eventTitle   = strval($row['eventTitle']);
        $this->duration     = intval($row['duration']);
        $this->importance   = intval($row['importance']);
        $this->response     = strval($row['response']);
        $this->eventText    = strval($row['eventText']);
    }

}
