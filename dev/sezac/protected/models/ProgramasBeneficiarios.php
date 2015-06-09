<?php

/**
 * This is the model class for table "ProgramasBeneficiarios".
 *
 * The followings are the available columns in table 'ProgramasBeneficiarios':
 *
 * @property string $id
 * @property string $tipo
 * @property string $estatus
 * @property string $idPrograma
 * @property string $idOrganizacion
 * @property string $idBeneficiario
 *
 * The followings are the available model relations:
 * @property Beneficiarios $idBeneficiario0
 * @property Organizaciones $idOrganizacion0
 * @property Programas $idPrograma0
 * @property Vetados[] $vetadoses
 */
class ProgramasBeneficiarios extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'ProgramasBeneficiarios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('idPrograma', 'required'),
        array('tipo,fecha', 'length', 'max'=>12),
        array('estatus, idPrograma, idOrganizacion, idBeneficiario', 'length', 'max'=>10),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, tipo, estatus, idPrograma, idOrganizacion, idBeneficiario, fecha', 'safe', 'on'=>'search'),
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
        'idBeneficiario0' => array(self::BELONGS_TO, 'Beneficiarios', 'idBeneficiario'),
        'idOrganizacion0' => array(self::BELONGS_TO, 'Organizaciones', 'idOrganizacion'),
        'idPrograma0' => array(self::BELONGS_TO, 'Programas', 'idPrograma'),
        'vetadoses' => array(self::HAS_MANY, 'Vetados', 'idProgramasBeneficiario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
        'id' => 'ID',
        'tipo' => 'Tipo',
        'estatus' => 'Estatus',
        'idPrograma' => 'Programa',
        'idOrganizacion' => 'Organizacion',
        'idBeneficiario' => 'Beneficiario',
        'fecha'=>'Fecha'
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

        $criteria->with = array("idPrograma0","idOrganizacion0","idBeneficiario0"); 
        $criteria->compare('tipo', $this->tipo, true);
        $criteria->compare('estatus', $this->estatus, true);
        $criteria->compare('idPrograma0.nombre', $this->idPrograma, true);
        $criteria->compare('idOrganizacion0.nombre', $this->idOrganizacion, true);
        $criteria->compare('concat(idBeneficiario0.nombre," ",idBeneficiario0.apellidoPaterno," ",idBeneficiario0.apellidoMaterno)', $this->idBeneficiario, true);
        $criteria->compare('DATE_FORMAT(fecha,"%d-%m-%Y")', $this->fecha, true);
        return new CActiveDataProvider(
            $this, array(
            'criteria'=>$criteria,
            )
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProgramasBeneficiarios the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * @objetivo Antes de mostrar los resultados de 
     * la busqueda cambiar el formato de las fechas a dd-mm-yyyy
     * @param type $options
     * @return boolean
     */
    public function afterFind($options = array()) 
    {
        $this->fecha = date('d-m-Y', strtotime($this->fecha));
        return true;
    }
}
