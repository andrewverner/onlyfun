<?php

/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 23.11.2016
 * Time: 20:50
 */

class EveXMLCharacterBookmarks extends EveXMLApi
{

    public $list;
    public $creators;
    public $locations;

    public function __construct($keyID, $vCode, $characterID)
    {
        $this->url = '/char/Bookmarks.xml.aspx';

        $this->params = http_build_query([
            'keyID'         => $keyID,
            'vCode'         => $vCode,
            'characterID'   => $characterID
        ]);

        if ($xml = $this->send()) {
            $creators = [];
            $locations = [];
            foreach ($xml->rowset->row as $row) {
                $folderName = strval($row['folderName']);
                foreach ($row->rowset->row as $row) {
                    $bookmark = new EveXMLBookmark($row);
                    $this->list[$folderName][] = $bookmark;

                    if ($bookmark->creatorID != 0 && !array_key_exists($bookmark->creatorID, $creators)) {
                        $creators[$bookmark->creatorID] = new EveXMLPublicCharacterInfo($bookmark->creatorID);
                    }

                    if ($bookmark->locationID != 0 && !array_key_exists($bookmark->locationID, $locations)) {
                        $locations[$bookmark->locationID] = SolarSystem::model()->findByPk($bookmark->locationID);
                    }
                }
            }
            $this->creators = $creators;
            $this->locations = $locations;
            return $this;
        }
        else
            return false;
    }

}
