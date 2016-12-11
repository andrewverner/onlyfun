<?php

/**
 * This is the model class for table "invTypes".
 *
 * The followings are the available columns in table 'invTypes':
 * @property integer $typeID
 * @property integer $groupID
 * @property string $typeName
 * @property string $description
 * @property double $mass
 * @property double $volume
 * @property double $capacity
 * @property integer $portionSize
 * @property integer $raceID
 * @property string $basePrice
 * @property integer $published
 * @property integer $marketGroupID
 * @property integer $iconID
 * @property integer $soundID
 * @property integer $graphicID
 */
class InvTypes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'invTypes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('typeID', 'required'),
			array('typeID, groupID, portionSize, raceID, published, marketGroupID, iconID, soundID, graphicID', 'numerical', 'integerOnly'=>true),
			array('mass, volume, capacity', 'numerical'),
			array('typeName', 'length', 'max'=>100),
			array('basePrice', 'length', 'max'=>19),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('typeID, groupID, typeName, description, mass, volume, capacity, portionSize, raceID, basePrice, published, marketGroupID, iconID, soundID, graphicID', 'safe', 'on'=>'search'),
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
			'typeID' => 'Type',
			'groupID' => 'Group',
			'typeName' => 'Type Name',
			'description' => 'Description',
			'mass' => 'Mass',
			'volume' => 'Volume',
			'capacity' => 'Capacity',
			'portionSize' => 'Portion Size',
			'raceID' => 'Race',
			'basePrice' => 'Base Price',
			'published' => 'Published',
			'marketGroupID' => 'Market Group',
			'iconID' => 'Icon',
			'soundID' => 'Sound',
			'graphicID' => 'Graphic',
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

		$criteria->compare('typeID',$this->typeID);
		$criteria->compare('groupID',$this->groupID);
		$criteria->compare('typeName',$this->typeName,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('mass',$this->mass);
		$criteria->compare('volume',$this->volume);
		$criteria->compare('capacity',$this->capacity);
		$criteria->compare('portionSize',$this->portionSize);
		$criteria->compare('raceID',$this->raceID);
		$criteria->compare('basePrice',$this->basePrice,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('marketGroupID',$this->marketGroupID);
		$criteria->compare('iconID',$this->iconID);
		$criteria->compare('soundID',$this->soundID);
		$criteria->compare('graphicID',$this->graphicID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InvTypes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
