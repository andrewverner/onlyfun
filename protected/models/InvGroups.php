<?php

/**
 * This is the model class for table "invGroups".
 *
 * The followings are the available columns in table 'invGroups':
 * @property integer $groupID
 * @property integer $categoryID
 * @property string $groupName
 * @property integer $iconID
 * @property integer $useBasePrice
 * @property integer $anchored
 * @property integer $anchorable
 * @property integer $fittableNonSingleton
 * @property integer $published
 */
class InvGroups extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'invGroups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('groupID', 'required'),
			array('groupID, categoryID, iconID, useBasePrice, anchored, anchorable, fittableNonSingleton, published', 'numerical', 'integerOnly'=>true),
			array('groupName', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('groupID, categoryID, groupName, iconID, useBasePrice, anchored, anchorable, fittableNonSingleton, published', 'safe', 'on'=>'search'),
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
			'groupID' => 'Group',
			'categoryID' => 'Category',
			'groupName' => 'Group Name',
			'iconID' => 'Icon',
			'useBasePrice' => 'Use Base Price',
			'anchored' => 'Anchored',
			'anchorable' => 'Anchorable',
			'fittableNonSingleton' => 'Fittable Non Singleton',
			'published' => 'Published',
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

		$criteria->compare('groupID',$this->groupID);
		$criteria->compare('categoryID',$this->categoryID);
		$criteria->compare('groupName',$this->groupName,true);
		$criteria->compare('iconID',$this->iconID);
		$criteria->compare('useBasePrice',$this->useBasePrice);
		$criteria->compare('anchored',$this->anchored);
		$criteria->compare('anchorable',$this->anchorable);
		$criteria->compare('fittableNonSingleton',$this->fittableNonSingleton);
		$criteria->compare('published',$this->published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InvGroups the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
