<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 25.11.16
 * Time: 15:58
 */

class EveXMLContact
{

    public $contactID;
    public $contactName;
    public $standing;
    public $contactTypeID;
    public $labelMask;
    public $inWatchlist;
    public $image;

    public function __construct($row)
    {
        $this->contactID        = intval($row['contactID']);
        $this->contactName      = strval($row['contactName']);
        $this->standing         = floatval($row['standing']);
        $this->contactTypeID    = intval($row['contactTypeID']);
        $this->labelMask        = intval($row['labelMask']);
        $this->inWatchlist      = strval($row['inWatchlist']);

        if ($this->contactTypeID == 2) {
            $this->image = EveHelper::image($this->contactID, 64, EveHelper::IMAGE_TYPE_CORPORATION);
        } elseif ($this->contactTypeID == 16159) {
            $this->image = EveHelper::image($this->contactID, 64, EveHelper::IMAGE_TYPE_ALLIANCE);
        }
        else
            $this->image = EveHelper::image($this->contactID, 64, EveHelper::IMAGE_TYPE_CHARACTER);
    }

}
