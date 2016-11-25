<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 25.11.16
 * Time: 15:52
 */

class EveXMLCharacterContactList extends EveXMLApi
{

    public $contactList;
    public $corporateContactList;
    public $allianceContactList;

    public function __construct($keyID, $vCode, $characterID, $simulate = false)
    {
        $this->params = http_build_query([
            'keyID'         => $keyID,
            'vCode'         => $vCode,
            'characterID'   => $characterID
        ]);
        $this->simulate = $simulate;

        $this->url = '/char/ContactList.xml.aspx';

        if ($xml = $this->send()) {
            foreach ($xml->rowset as $rowset) {
                switch (strval($rowset['name'])) {
                    case 'contactList':
                        foreach ($rowset->row as $row) {
                            $this->contactList[] = new EveXMLContact($row);
                        }
                        break;
                    case 'corporateContactList':
                        foreach ($rowset->row as $row) {
                            $this->corporateContactList[] = new EveXMLContact($row);
                        }
                        break;
                    case 'allianceContactList':
                        foreach ($rowset->row as $row) {
                            $this->allianceContactList[] = new EveXMLContact($row);
                        }
                        break;
                }
            }
            return $this;
        }
        else
            return false;
    }

}
