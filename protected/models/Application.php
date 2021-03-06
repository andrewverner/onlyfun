<?php

/**
 * This is the model class for table "application".
 *
 * The followings are the available columns in table 'application':
 * @property integer $id
 * @property integer $keyID
 * @property string $vCode
 * @property string $datetime
 * @property integer $status
 * @property string $email
 * @property integer $corporationID
 * @property integer $characterID
 */
class Application extends CActiveRecord
{

    private $_character;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'application';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('keyID, vCode, datetime, email, corporationID, characterID', 'required'),
			array('keyID, status, corporationID, characterID', 'numerical', 'integerOnly'=>true),
			array('vCode', 'length', 'max'=>64),
			array('email', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, keyID, vCode, datetime, status, email, corporationID, characterID', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'keyID' => 'Key',
			'vCode' => 'V Code',
			'datetime' => 'Datetime',
			'status' => 'Status',
			'email' => 'Email',
			'corporationID' => 'Corporation',
			'characterID' => 'Character',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('keyID',$this->keyID);
		$criteria->compare('vCode',$this->vCode,true);
		$criteria->compare('datetime',$this->datetime,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('corporationID',$this->corporationID);
		$criteria->compare('characterID',$this->characterID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Application the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function newCount()
    {
        return Application::model()->countByAttributes([
            'corporationID' => Yii::app()->user->character->corporationID,
            'status' => 0
        ]);
    }

    public function getCharacter()
    {
        if (!$this->_character) {
            $this->_character = new EveXMLPublicCharacterInfo($this->characterID);
        }
        return $this->_character;
    }

}
