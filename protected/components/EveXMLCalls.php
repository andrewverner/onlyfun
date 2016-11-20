<?php

/**
 * Created by PhpStorm.
 * User: verner
 * Date: 20.11.16
 * Time: 20:51
 */

class EveXMLCalls extends EveXMLApi
{

    public $calls;

    public function __construct()
    {
        $this->url = '/api/CallList.xml.aspx';

        if ($xml = $this->send()) {
            foreach ($xml->rowset as $rowset) {
                if (strval($rowset['name']) == 'calls') {
                    foreach ($rowset->row as $row) {
                        if (strval($row['type']) == 'Character') {
                            $this->calls[] = new EveXMLCall($row);
                        }
                    }
                }
            }
        }
    }

}
