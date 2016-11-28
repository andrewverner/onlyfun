<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 28.11.16
 * Time: 17:39
 */

class EveXMLCharacterSkillQueue extends EveXMLApi
{

    public $list;

    public function __construct($keyID, $vCode, $characterID, $simulate = false)
    {
        $this->url = '/char/SkillQueue.xml.aspx';

        $this->params = http_build_query([
            'keyID'         => $keyID,
            'vCode'         => $vCode,
            'characterID'   => $characterID
        ]);
        $this->simulate = $simulate;

        if ($xml = $this->send()) {
            foreach ($xml->rowset->row as $row) {
                $this->list[] = new EveXMLQueueSkill($row);
            }
            return $this;
        }
        else
            return false;
    }

}
