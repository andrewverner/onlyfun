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

    public function __construct($keyID, $vCode, $characterID)
    {
        $this->url = '/char/Bookmarks.xml.aspx';

        $this->params = http_build_query([
            'keyID'         => $keyID,
            'vCode'         => $vCode,
            'characterID'   => $characterID
        ]);

        if ($xml = $this->send()) {
            foreach ($xml->rowset->row as $row) {
                $folderName = strval($row['folderName']);
                foreach ($row->rowset->row as $row) {
                    $this->list[$folderName][] = new EveXMLBookmark($row);
                }
            }
            return $this;
        }
        else
            return false;
    }

}
