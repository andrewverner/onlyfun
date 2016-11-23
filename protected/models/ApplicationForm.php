<?php

/**
 * Created by PhpStorm.
 * User: verner
 * Date: 20.11.16
 * Time: 20:14
 */

class ApplicationForm extends CFormModel
{

    public $keyID;
    public $vCode;
    public $email;

    public function rules()
    {
        return [
            ['keyID, vCode, email', 'required'],
            ['email', 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'keyID' => 'Key ID',
            'vCode' => 'Verification Code',
            'email' => 'Email',
        ];
    }

}
