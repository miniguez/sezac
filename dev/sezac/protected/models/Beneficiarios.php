<?php

/**
 * This is the model class for table "Beneficiarios".
 *
 * The followings are the available columns in table 'Beneficiarios':
 * @property string $id
 * @property string $nombre
 * @property string $apellidoPaterno
 * @property string $apellidoMaterno
 * @property string $direccion
 * @property string $telefono
 * @property string $idOrganizacion
 * @property string $idMunicipio
 * @property string $rfc
 *
 * The followings are the available model relations:
 * @property Municipios $idMunicipio0
 * @property Organizaciones $idOrganizacion0
 * @property Programasbeneficiarios[] $programasbeneficiarioses
 */
class Beneficiarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $idEstado,$tipo;
	public function tableName()
	{
		return 'Beneficiarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellidoPaterno, idMunicipio, rfc,idEstado', 'required'),
			array('nombre, apellidoPaterno, apellidoMaterno', 'length', 'max'=>80),
			array('direccion', 'length', 'max'=>180),
			array('telefono,tipo', 'length', 'max'=>18),
			array('idOrganizacion, idMunicipio, idEstado', 'length', 'max'=>10),
			array('rfc', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellidoPaterno, apellidoMaterno, direccion, telefono, idOrganizacion, idMunicipio, rfc', 'safe', 'on'=>'search'),
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
			'idMunicipio0' => array(self::BELONGS_TO, 'Municipios', 'idMunicipio'),
			'idOrganizacion0' => array(self::BELONGS_TO, 'Organizaciones', 'idOrganizacion'),
			'programasbeneficiarioses' => array(self::HAS_MANY, 'Programasbeneficiarios', 'idBeneficiario'),
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
			'apellidoPaterno' => 'Apellido Paterno',
			'apellidoMaterno' => 'Apellido Materno',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'idOrganizacion' => 'Organizacion',
			'idMunicipio' => ' Municipio',
                        'idEstado' => 'Estado',
			'rfc' => 'Rfc',
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
	public function search($idOrganizacion = null)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->with=array("idMunicipio0.idEstado0");
                
                if ($idOrganizacion!=null) {
                    $criteria->condition="idOrganizacion = ".$idOrganizacion;
                }
                
                $criteria->compare('concat(t.nombre," ",apellidoPaterno," ",apellidoMaterno)',$this->nombre,true);
		$criteria->compare('idMunicipio0.nombre',$this->idMunicipio,true);
		$criteria->compare('idEstado0.nombre',$this->idEstado,true);
                                                
		return new CActiveDataProvider(
		 $this, array(
                    'criteria'=>$criteria,
                    'sort'=> array(
                        'defaultOrder' => 't.id DESC',
                        'attributes'=>
                            array(
                                'idEstado'=>
                                    array(
                                        'asc'=>'idEstado0.nombre ASC',
                                        'desc'=>'idEstado0.nombre DESC',
                                    ),                            
                                '*',
                            ),
                    ),
                )
                );
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Beneficiarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        /**
         * Funcion para traerl el arreglo de objetos de beneficiarios u organizaciones
         */
        public function searchBeneficiarioOrganizacion($idPrograma) 
        {
            $criteria=new CDbCriteria;
            
            $criteria->select=
                    "if(Organizaciones.nombre is null,t.id,Organizaciones.id) as id,
                     if(
                     Organizaciones.nombre is null,concat(t.nombre,\" \",t.apellidoPaterno,\" \",t.apellidoMaterno),
                     Organizaciones.nombre 
                     ) as nombre,
                    if(Organizaciones.nombre is null,t.rfc,'N/A') as rfc,
                    if(Organizaciones.nombre is null,\"Beneficiario\",\"Organizacion\") as tipo";
            $criteria->join=(
                "left join Organizaciones on t.idOrganizacion = Organizaciones.id
                 left join ProgramasBeneficiarios on (ProgramasBeneficiarios.idBeneficiario = t.id or
                 ProgramasBeneficiarios.idOrganizacion = Organizaciones.id ) and ProgramasBeneficiarios.idPrograma=".$idPrograma
                 
                 
            );
            $criteria->condition="ProgramasBeneficiarios.id is null and isVetado(t.id) = 0";
            $criteria->group="nombre";
            $criteria->compare('t.nombre',$this->nombre,true);            
            $criteria->compare('if(Organizaciones.nombre is null,t.rfc,\'N/A\')',$this->rfc,true);
            $criteria->compare('if(Organizaciones.nombre is null,\'Beneficiario\',\'Organizacion\')',$this->tipo,true);
            return new CActiveDataProvider(
             $this, array(
                'criteria'=>$criteria,
                'sort'=> array(
                    'defaultOrder' => 't.id DESC',
                    'attributes'=>
                        array(
                            'tipo'=>
                                array(
                                    'asc'=>'tipo ASC',
                                    'desc'=>'tipo DESC',
                                ),                            
                            '*',
                        ),
                ),
            )
            );
                       
        }
        /**
         * Funcion para saber si un beneficiario esta vetado
         */
        public function isVetado() 
        {
            $programasBeneficiarios = false;
            if($this->idOrganizacion) {
                $programasBeneficiarios = ProgramasBeneficiarios::model()->find(
                        'idOrganizacion=:param1 and estatus="NoConcluyo"',
                        array(
                            ':param1'=>  $this->idOrganizacion
                        )
                );
            } else {
                $programasBeneficiarios = ProgramasBeneficiarios::model()->find(
                        'idBeneficiario:=param1 and estatus="NoConcluyo"',
                        array(
                            ':param1'=>  $this->id
                        )
                );
            } 
            if ($programasBeneficiarios) {
                return true;
            }
            return false;
        }
}
