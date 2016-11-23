<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 1:49
 */
class EveXMLCharacterSheet extends EveXMLApi
{

    public $homeStationID;
    public $DoB;
    public $race;
    public $bloodLine;
    public $ancestry;
    public $gender;
    public $corporationName;
    public $corporationID;
    public $allianceName;
    public $allianceID;
    public $cloneTypeID;
    public $cloneName;
    public $cloneSkillPoints;
    public $freeSkillPoints;
    public $freeRespecs;
    public $cloneJumpDate;
    public $lastRespecDate;
    public $lastTimedRespec;
    public $remoteStationDate;
    public $jumpClones;
    public $jumpCloneImplants;
    public $jumpActivation;
    public $jumpFatigue;
    public $jumpLastUpdate;
    public $balance;
    public $implants;
    public $attributes;
    public $skills;
    public $certificates;
    public $corporationRoles;
    public $corporationRolesAtHQ;
    public $corporationRolesAtBase;
    public $corporationRolesAtOther;
    public $corporationTitles;

    public function __construct($keyID, $vCode, $characterID)
    {
        $this->params = http_build_query([
            'keyID'         => $keyID,
            'vCode'         => $vCode,
            'characterID'   => $characterID
        ]);

        $this->url = '/char/CharacterSheet.xml.aspx';

        if ($xml = $this->send()) {
            $this->homeStationID =      strval($xml->homeStationID);
            $this->DoB =                strval($xml->DoB);
            $this->race =               strval($xml->race);
            $this->bloodLine =          strval($xml->bloodLine);
            $this->ancestry =           strval($xml->ancestry);
            $this->gender =             strval($xml->gender);
            $this->corporationName =    strval($xml->corporationName);
            $this->corporationID =      strval($xml->corporationID);
            $this->allianceName =       strval($xml->allianceName);
            $this->allianceID =         strval($xml->allianceID);
            $this->cloneTypeID =        strval($xml->cloneTypeID);
            $this->cloneName =          strval($xml->cloneName);
            $this->cloneSkillPoints =   strval($xml->cloneSkillPoints);
            $this->freeSkillPoints =    strval($xml->freeSkillPoints);
            $this->freeRespecs =        strval($xml->freeRespecs);
            $this->cloneJumpDate =      strval($xml->cloneJumpDate);
            $this->lastRespecDate =     strval($xml->lastRespecDate);
            $this->lastTimedRespec =    strval($xml->lastTimedRespec);
            $this->remoteStationDate =  strval($xml->remoteStationDate);
            $this->jumpActivation =     strval($xml->jumpActivation);
            $this->jumpFatigue =        strval($xml->jumpFatigue);
            $this->jumpLastUpdate =     strval($xml->jumpLastUpdate);
            $this->balance =            strval($xml->balance);
            $this->attributes =         new EveXMLCharacterAttributes($xml->attributes);

            $classes = [
                'jumpClones' => 'EveXMLCharacterClone',
                'jumpCloneImplants' => 'EveXMLCharacterCloneImplant',
                'implants' => 'EveXMLCharacterImplant',
                'corporationRoles' => 'EveXMLCharacterCorporationRole',
                'corporationRolesAtHQ' => 'EveXMLCharacterCorporationRoleAtHQ',
                'corporationRolesAtBase' => 'EveXMLCharacterCorporationRoleAtBase',
                'corporationRolesAtOther' => 'EveXMLCharacterCorporationRoleAtOther',
                'corporationTitles' => 'EveXMLCharacterCorporationTitle'
            ];

            foreach ($xml->rowset as $rowset) {
                $name = strval($rowset['name']);
                if (array_key_exists($name, $classes)) {
                    $className = $classes[$name];
                    $this->{$name} = [];
                    foreach ($rowset as $row) {
                        $this->{$name}[] = new $className($row);
                    }
                } else {
                    if (strval($rowset['name']) == 'skills') {
                        foreach ($rowset as $row) {
                            //@todo
                        }
                    }
                }
            }

            /*foreach ($xml->rowset as $rowset) {
                switch (strval($rowset['name'])) {
                    case 'jumpClones':
                        $this->jumpClones = [];
                        foreach ($rowset as $row) {
                            $this->jumpClones[] = new EveXMLCharacterClone($row);
                        }
                        break;
                    case 'jumpCloneImplants':
                        $this->jumpCloneImplants = [];
                        foreach ($rowset as $row) {
                            $this->jumpCloneImplants[] = new EveXMLCharacterCloneImplant($row);
                        }
                        break;
                    case 'implants':
                        $this->jumpCloneImplants = [];
                        foreach ($rowset as $row) {
                            $this->jumpCloneImplants[] = new EveXMLCharacterCloneImplant($row);
                        }
                        break;
                }
            }*/

            return $this;
        }
    }

}
