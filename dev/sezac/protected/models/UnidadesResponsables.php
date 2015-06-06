<?php

/**
 * This is the model class for table "UnidadesResponsables".
 *
 * The followings are the available columns in table 'UnidadesResponsables':
 * @property string $id
 * @property string $nombre
 * @property string $idDependecia
 * @property string $idEncargado
 *
 * The followings are the available model relations:
 * @property Programas[] $programases
 * @property Dependecias $idDependecia0
 * @property Encargados $idEncargado0
 */
class UnidadesResponsables extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'UnidadesResponsables';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, idDependecia, idEncargado', 'required'),
			array('nombre', 'length', 'max'=>45),
			array('idDependecia, idEncargado', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, idDependecia, idEncargado', 'safe', 'on'=>'search'),
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
			'programases' => array(self::HAS_MANY, 'Programas', 'idUnidadesResponsable'),
			'idDependecia0' => array(self::BELONGS_TO, 'Dependecias', 'idDependecia'),
			'idEncargado0' => array(self::BELONGS_TO, 'Encargados', 'idEncargado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'idDependecia' => 'Id Dependecia',
			'idEncargado' => 'Id Encargado',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('idDependecia',$this->idDependecia,true);
		$criteria->compare('idEncargado',$this->idEncargado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UnidadesResponsables the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
