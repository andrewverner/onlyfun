<?php

/**
 * This is the model class for table "staStations".
 *
 * The followings are the available columns in table 'staStations':
 * @property string $stationID
 * @property integer $security
 * @property double $dockingCostPerVolume
 * @property double $maxShipVolumeDockable
 * @property integer $officeRentalCost
 * @property integer $operationID
 * @property integer $stationTypeID
 * @property integer $corporationID
 * @property integer $solarSystemID
 * @property integer $constellationID
 * @property integer $regionID
 * @property string $stationName
 * @property double $x
 * @property double $y
 * @property double $z
 * @property double $reprocessingEfficiency
 * @property double $reprocessingStationsTake
 * @property integer $reprocessingHangarFlag
 */
class Stations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'staStations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stationID', 'required'),
			array('security, officeRentalCost, operationID, stationTypeID, corporationID, solarSystemID, constellationID, regionID, reprocessingHangarFlag', 'numerical', 'integerOnly'=>true),
			array('dockingCostPerVolume, maxShipVolumeDockable, x, y, z, reprocessingEfficiency, reprocessingStationsTake', 'numerical'),
			array('stationID', 'length', 'max'=>20),
			array('stationName', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('stationID, security, dockingCostPerVolume, maxShipVolumeDockable, officeRentalCost, operationID, stationTypeID, corporationID, solarSystemID, constellationID, regionID, stationName, x, y, z, reprocessingEfficiency, reprocessingStationsTake, reprocessingHangarFlag', 'safe', 'on'=>'search'),
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
			'stationID' => 'Station',
			'security' => 'Security',
			'dockingCostPerVolume' => 'Docking Cost Per Volume',
			'maxShipVolumeDockable' => 'Max Ship Volume Dockable',
			'officeRentalCost' => 'Office Rental Cost',
			'operationID' => 'Operation',
			'stationTypeID' => 'Station Type',
			'corporationID' => 'Corporation',
			'solarSystemID' => 'Solar System',
			'constellationID' => 'Constellation',
			'regionID' => 'Region',
			'stationName' => 'Station Name',
			'x' => 'X',
			'y' => 'Y',
			'z' => 'Z',
			'reprocessingEfficiency' => 'Reprocessing Efficiency',
			'reprocessingStationsTake' => 'Reprocessing Stations Take',
			'reprocessingHangarFlag' => 'Reprocessing Hangar Flag',
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

		$criteria->compare('stationID',$this->stationID,true);
		$criteria->compare('security',$this->security);
		$criteria->compare('dockingCostPerVolume',$this->dockingCostPerVolume);
		$criteria->compare('maxShipVolumeDockable',$this->maxShipVolumeDockable);
		$criteria->compare('officeRentalCost',$this->officeRentalCost);
		$criteria->compare('operationID',$this->operationID);
		$criteria->compare('stationTypeID',$this->stationTypeID);
		$criteria->compare('corporationID',$this->corporationID);
		$criteria->compare('solarSystemID',$this->solarSystemID);
		$criteria->compare('constellationID',$this->constellationID);
		$criteria->compare('regionID',$this->regionID);
		$criteria->compare('stationName',$this->stationName,true);
		$criteria->compare('x',$this->x);
		$criteria->compare('y',$this->y);
		$criteria->compare('z',$this->z);
		$criteria->compare('reprocessingEfficiency',$this->reprocessingEfficiency);
		$criteria->compare('reprocessingStationsTake',$this->reprocessingStationsTake);
		$criteria->compare('reprocessingHangarFlag',$this->reprocessingHangarFlag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Stations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
