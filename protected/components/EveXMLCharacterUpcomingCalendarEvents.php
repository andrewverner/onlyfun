<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 24.11.16
 * Time: 16:06
 */

class EveXMLCharacterUpcomingCalendarEvents extends EveXMLApi
{

    public $list;

    public function __construct($keyID, $vCode, $characterID, $simulate = false)
    {
        $this->params = http_build_query([
            'keyID'         => $keyID,
            'vCode'         => $vCode,
            'characterID'   => $characterID
        ]);
        $this->simulate = $simulate;

        $this->url = '/char/UpcomingCalendarEvents.xml.aspx';

        if ($xml = $this->send()) {
            foreach ($xml->rowset->row as $row) {
                $this->list[] = new EveXMLCalendarEvent($row);
            }
            return $this;
        }
        else
            return false;
    }

}
