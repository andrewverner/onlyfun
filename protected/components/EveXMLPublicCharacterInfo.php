<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 1:05
 */
class EveXMLPublicCharacterInfo extends EveXMLApi
{

    public $characterID;
    public $characterName;
    public $race;
    public $bloodlineID;
    public $bloodline;
    public $ancestryID;
    public $ancestry;
    public $corporationID;
    public $corporation;
    public $corporationDate;
    public $allianceID;
    public $alliance;
    public $allianceDate;
    public $securityStatus;
    public $employmentHistory;

    public function __construct($characterID)
    {
        $this->url = '/eve/CharacterInfo.xml.aspx';
        $this->params = http_build_query([
            'characterID' => $characterID
        ]);

        if ($xml = $this->send()) {
            $this->characterID = strval($xml->characterID);
            $this->characterName = strval($xml->characterName);
            $this->race = strval($xml->race);
            $this->bloodlineID = intval($xml->bloodlineID);
            $this->bloodline = strval($xml->bloodline);
            $this->ancestryID = intval($xml->ancestryID);
            $this->ancestry = strval($xml->ancestry);
            $this->corporationID = strval($xml->corporationID);
            $this->corporation = strval($xml->corporation);
            $this->corporationDate = strval($xml->corporationDate);
            $this->allianceID = strval($xml->allianceID);
            $this->alliance = strval($xml->alliance);
            $this->allianceDate = strval($xml->allianceDate);
            $this->securityStatus = strval($xml->securityStatus);
            foreach ($xml->rowset[0] as $row) {
                $this->employmentHistory[] = new EmploymentHistoryRecord($row);
            }
            return $this;
        }
        else
            return false;
    }

}
