<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 01.12.16
 * Time: 13:55
 */

class EveXMLCharacterAssets extends EveXMLApi
{

    public $list;

    public function __construct($keyID, $vCode, $characterID)
    {
        $this->url = '/char/AssetList.xml.aspx';

        $this->params = http_build_query([
            'keyID'         => $keyID,
            'vCode'         => $vCode,
            'characterID'   => $characterID
        ]);

        if ($xml = $this->send()) {
            foreach ($xml->rowset->row as $row) {
                $locationID = intval($row['locationID']);

                if (!isset($this->list[$locationID])) {
                    $this->list[$locationID]['location'] = ($locationID > 60000000) ?
                        Stations::model()->findByPk($locationID) :
                        SolarSystem::model()->findByAttributes(['solarSystemID' => $locationID]);
                }

                $typeID = intval($row['typeID']);
                $this->list[$locationID]['items'][$typeID]['item'] = new EveXMLAsset($row);

                if (isset($row->rowset)) {
                    foreach ($row->rowset->row as $nested) {
                        $this->list[$locationID]['items'][$typeID]['nested'][] = new EveXMLAsset($nested);
                    }
                }
            }
        }
        else
            return false;
    }

}
