<?php

/**
 * Created by PhpStorm.
 * User: verner
 * Date: 20.11.16
 * Time: 17:58
 */

class RegForm extends CFormModel
{

    public $username;
    public $passwd1;
    public $passwd2;
    public $email;

    public function rules()
    {
        return [
            ['username, passwd1, passwd2, email', 'required'],
            ['username', 'length', 'max' => 45, 'allowEmpty' => false,
                'tooLong' => Yii::t('message', 'Username is too long (max 45 symbols)')
            ],
            ['username', 'isFree'],
            ['email', 'length', 'max' => 45, 'allowEmpty' => false,
                'tooLong' => Yii::t('message', 'Email is too long (max 45 symbols)')
            ],
            ['passwd1, passwd2', 'length', 'min' => 6, 'max' => 12,
                'tooShort' => Yii::t('message', 'Pass phrase is too short (min 6, max 12)'),
                'tooLong' => Yii::t('message', 'Pass phrase is too long (min 6, max 12)')
            ],
            ['passwd2', 'compare', 'compareAttribute' => 'passwd1'],
            ['email', 'email']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('form', 'Username'),
            'passwd1' => Yii::t('form', 'Password (6-12 symbols)'),
            'passwd2' => Yii::t('form', 'Password confirmation'),
            'email' => Yii::t('form', 'Email'),
        ];
    }

    public function isFree()
    {
        $model = User::model()->findByAttributes(['username' => $this->username]);
        if ($model) $this->addError('username', Yii::t('message', 'Username is unavailable'));
    }

}
