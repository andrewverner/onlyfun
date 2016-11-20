<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 19.11.16
 * Time: 22:53
 */
class WebUser extends CWebUser
{

    private $_model;

    function getId(){
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->first_name;
    }

}
