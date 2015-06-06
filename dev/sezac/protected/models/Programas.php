<?php

/**
 * This is the model class for table "Programas".
 *
 * The followings are the available columns in table 'Programas':
 * @property string $id
 * @property string $nombre
 * @property string $archivo
 * @property string $idUnidadesResponsable
 * @property string $idAniosFiscale
 *
 * The followings are the available model relations:
 * @property UnidadesResponsables $idUnidadesResponsable0
 * @property AniosFiscales $idAniosFiscale0
 * @property ProgramasBeneficiarios[] $programasBeneficiarioses
 */
class Programas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Programas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, idUnidadesResponsable, idAniosFiscale', 'required'),
			array('nombre', 'length', 'max'=>255),
			array('archivo', 'length', 'max'=>120),
			array('idUnidadesResponsable, idAniosFiscale', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, archivo, idUnidadesResponsable, idAniosFiscale', 'safe', 'on'=>'search'),
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
			'idUnidadesResponsable0' => array(self::BELONGS_TO, 'UnidadesResponsables', 'idUnidadesResponsable'),
			'idAniosFiscale0' => array(self::BELONGS_TO, 'AniosFiscales', 'idAniosFiscale'),
			'programasBeneficiarioses' => array(self::HAS_MANY, 'ProgramasBeneficiarios', 'idPrograma'),
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
			'archivo' => 'Archivo',
			'idUnidadesResponsable' => 'Id Unidades Responsable',
			'idAniosFiscale' => 'Id Anios Fiscale',
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
		$criteria->compare('archivo',$this->archivo,true);
		$criteria->compare('idUnidadesResponsable',$this->idUnidadesResponsable,true);
		$criteria->compare('idAniosFiscale',$this->idAniosFiscale,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Programas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
