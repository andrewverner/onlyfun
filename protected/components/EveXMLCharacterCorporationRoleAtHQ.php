<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 20.11.16
 * Time: 3:30
 */

class EveXMLCharacterCorporationRoleAtHQ
{

    public $roleName;
    public $roleID;

    public function __construct($row)
    {
        $this->roleName = strval($row['roleName']);
        $this->roleID = intval($row['roleID']);
    }

}
