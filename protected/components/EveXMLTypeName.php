<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 2:48
 */

class EveXMLTypeName extends EveXMLApi
{

    public $typeName;

    public function __construct($types)
    {
        $this->url = '/eve/TypeName.xml.aspx';
        $this->params = http_build_query([
            'ids' => is_array($types) ? implode(',', $types) : $types
        ]);

        if ($xml = $this->send()) {
            if (is_array($types)) {
                $array = [];
                foreach ($xml->rowset[0]->row as $row) {
                    $array[intval($row['typeID'])] = strval($row['typeName']);
                }
                $this->typeName = $array;
            } else {
                $this->typeName = strval($xml->rowset[0]->row['typeName']);
            }
            return $this;
        }
        else
            return false;
    }

}
