<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 28.11.16
 * Time: 16:49
 */

class EveXMLQueueSkill
{

    public $queuePosition;
    public $typeID;
    public $typeName;
    public $level;
    public $startSP;
    public $endSP;
    public $startTime;
    public $endTime;

    public function __construct($row)
    {
        $this->queuePosition    = intval($row['queuePosition']);
        $this->typeID           = intval($row['typeID']);
        $this->level            = intval($row['level']);
        $this->startSP          = intval($row['startSP']);
        $this->endSP            = intval($row['endSP']);
        $this->startTime        = strval($row['startTime']);
        $this->endTime          = strval($row['endTime']);

        $this->typeName = InvTypes::model()->findByAttributes(['typeID' => $this->typeID])->getAttribute('typeName');
    }

}
