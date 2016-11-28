<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 28.11.16
 * Time: 14:40
 */

class EveXMLCharacterLocations extends EveXMLApi
{

    public $list;

    public function __construct($keyID, $vCode, $characterID, $simulate = false)
    {
        $this->url = '/char/Locations.xml.aspx';

        $this->params = http_build_query([
            'keyID'         => $keyID,
            'vCode'         => $vCode,
            'characterID'   => $characterID
        ]);
        $this->simulate = $simulate;

        if ($xml = $this->send()) {
            foreach ($xml->rowset->row as $row) {
                $this->list[] = new EveXMLLocation($row);
            }
        }
        else
            return false;
    }

    public function simulate()
    {
        return <<<XML
<result>
    <rowset name="locations" key="itemID" columns="itemID,itemName,x,y,z">
        <row itemID="1017795212344" itemName="awesome ship" x="0" y="0" z="0"/>
        <row itemID="1017795212345" itemName="my container" x="0" y="0" z="0"/>
    </rowset>
</result>
XML;

    }

}
