<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 23.11.16
 * Time: 17:13
 */
class EveXMLCharacterBlueprints extends EveXMLApi
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

        $this->url = '/char/CharacterSheet.xml.aspx';

        if ($xml = $this->send()) {
            foreach ($xml->rowset->row as $row) {
                $this->list[] = new EveXMLBlueprint($row);
            }
            return $this;
        }
        else
            return false;
    }

    public function simulate()
    {
        return <<<XML
<result>
    <rowset columns="itemID,locationID,typeID,typeName,flagID,quantity,timeEfficiency,materialEfficiency,runs" key="itemID" name="blueprints">
        <row runs="1" materialEfficiency="0" timeEfficiency="0" quantity="-2" flagID="4" typeName="Rattlesnake Victory Edition Blueprint" typeID="34153" locationID="60003466" itemID="1014573377908"/>
        <row runs="10" materialEfficiency="0" timeEfficiency="0" quantity="-2" flagID="4" typeName="Council Diplomatic Shuttle Blueprint" typeID="34497" locationID="60003466" itemID="1012538208557"/>
        <row runs="1" materialEfficiency="0" timeEfficiency="0" quantity="-2" flagID="4" typeName="Victorieux Luxury Yacht Blueprint" typeID="34591" locationID="60003466" itemID="1017147043703"/>
    </rowset>
</result>
XML;

    }

}
