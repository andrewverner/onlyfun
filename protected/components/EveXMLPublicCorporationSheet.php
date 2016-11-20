<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 0:53
 */

class EveXMLPublicCorporationSheet extends EveXMLApi
{

    public $corporationID;
    public $corporationName;
    public $ticker;
    public $ceoID;
    public $ceoName;
    public $stationID;
    public $stationName;
    public $description;
    public $httpUrl;
    public $allianceID;
    public $allianceName;
    public $factionID;
    public $taxRate;
    public $memberCount;
    public $shares;

    public function __construct($corporationID)
    {
        $this->url = '/corp/CorporationSheet.xml.aspx';
        $this->params = http_build_query([
            'corporationID' => $corporationID
        ]);

        if ($xml = $this->send()) {
            $this->corporationID = strval($xml->corporationID);
            $this->corporationName = strval($xml->corporationName);
            $this->ticker = strval($xml->ticker);
            $this->ceoID = strval($xml->ceoID);
            $this->ceoName = strval($xml->ceoName);
            $this->stationID = strval($xml->stationID);
            $this->stationName = strval($xml->stationName);
            $this->description = strval($xml->description);
            $this->httpUrl = strval($xml->url);
            $this->allianceID = strval($xml->allianceID);
            $this->allianceName = strval($xml->allianceName);
            $this->factionID = intval($xml->factionID);
            $this->taxRate = floatval($xml->taxRate);
            $this->memberCount = intval($xml->memberCount);
            $this->shares = intval($xml->shares);
            return $this;
        }
        else
            return false;
    }

    public function image($size)
    {
        return "https://imageserver.eveonline.com/Corporation/{$this->corporationID}_{$size}.png";
    }

}
