<?php

/**
 * This is the model class for table "Beneficiarios".
 *
 * The followings are the available columns in table 'Beneficiarios':
 *
 * @property string $id
 * @property string $nombre
 * @property string $apellidoPaterno
 * @property string $apellidoMaterno
 * @property string $direccion
 * @property string $telefono
 * @property string $idOrganizacion
 * @property string $idMunicipio
 *
 * The followings are the available model relations:
 * @property Municipios $idMunicipio0
 * @property Organizaciones $idOrganizacion0
 * @property ProgramasBeneficiarios[] $programasBeneficiarioses
 */
class Beneficiarios extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
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
        array('nombre, apellidoPaterno, idMunicipio', 'required'),
        array('nombre, apellidoPaterno, apellidoMaterno', 'length', 'max'=>80),
        array('direccion', 'length', 'max'=>180),
        array('telefono', 'length', 'max'=>18),
        array('idOrganizacion, idMunicipio', 'length', 'max'=>10),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, nombre, apellidoPaterno, apellidoMaterno, direccion, telefono, idOrganizacion, idMunicipio', 'safe', 'on'=>'search'),
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
        'programasBeneficiarioses' => array(self::HAS_MANY, 'ProgramasBeneficiarios', 'idBeneficiario'),
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
        'idOrganizacion' => 'Id Organizacion',
        'idMunicipio' => 'Id Municipio',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellidoPaterno', $this->apellidoPaterno, true);
        $criteria->compare('apellidoMaterno', $this->apellidoMaterno, true);
        $criteria->compare('direccion', $this->direccion, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('idOrganizacion', $this->idOrganizacion, true);
        $criteria->compare('idMunicipio', $this->idMunicipio, true);

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
     * @return Beneficiarios the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
