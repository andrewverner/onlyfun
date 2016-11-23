<?php

/**
 * Created by PhpStorm.
 * User: dkhodakovskiy
 * Date: 19.11.16
 * Time: 17:54
 */
class LoginForm extends CFormModel
{

    public $username;
    public $password;

    private $_identity;

    public function rules()
    {
        return [
            ['username, password', 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username'  => Yii::t('user', 'username'),
            'password'  => Yii::t('user', 'password'),
        ];
    }

    public function login()
    {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        }

        if($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            Yii::app()->user->login($this->_identity);
            return true;
        }
        else
            return false;
    }

}
