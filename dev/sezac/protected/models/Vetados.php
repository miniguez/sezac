<?php

/**
 * This is the model class for table "Vetados".
 *
 * The followings are the available columns in table 'Vetados':
 *
 * @property string $id
 * @property string $fecha
 * @property string $idProgramasBeneficiario
 *
 * The followings are the available model relations:
 * @property ProgramasBeneficiarios $idProgramasBeneficiario0
 */
class Vetados extends CActiveRecord
{
    public $beneficiario,$programa;
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Vetados';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('fecha, idProgramasBeneficiario', 'required'),
        array('idProgramasBeneficiario', 'length', 'max'=>10),
       array('beneficiario,programa', 'length', 'max'=>50),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, fecha, idProgramasBeneficiario', 'safe', 'on'=>'search'),
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
        'idProgramasBeneficiario0' => array(self::BELONGS_TO, 'ProgramasBeneficiarios', 'idProgramasBeneficiario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'fecha' => 'Fecha',
            'idProgramasBeneficiario' => 'Programas Beneficiario',
            'programa'=>'Programa'
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
        $criteria->select="if(
        Organizaciones.nombre is null,concat(Beneficiarios.nombre,\" \",Beneficiarios.apellidoPaterno,\" \",Beneficiarios.apellidoMaterno),
        Organizaciones.nombre) as beneficiario,
        Programas.nombre as programa,
        t.fecha";
        $criteria->join="
            inner join ProgramasBeneficiarios on t.idProgramasBeneficiario = ProgramasBeneficiarios.id
            inner join Programas on ProgramasBeneficiarios.idPrograma = Programas.id
            left join Organizaciones on ProgramasBeneficiarios.idOrganizacion = Organizaciones.id
            left join Beneficiarios on ProgramasBeneficiarios.idBeneficiario = Beneficiarios.id ";        
        $criteria->compare('t.fecha', $this->fecha, true);
        $criteria->compare('Programas.nombre', $this->programa, true);
        $criteria->compare('if(
        Organizaciones.nombre is null,concat(Beneficiarios.nombre," ",Beneficiarios.apellidoPaterno," ",Beneficiarios.apellidoMaterno),
        Organizaciones.nombre)', $this->beneficiario, true);

        return new CActiveDataProvider(
           $this, array(
                    'criteria'=>$criteria,
                    'sort'=> array(
                        'defaultOrder' => 't.id DESC',
                        'attributes'=>
                            array(
                                'beneficiario'=>
                                    array(
                                        'asc'=>'beneficiario ASC',
                                        'desc'=>'beneficiario DESC',
                                    ),   
                                'programa'=>
                                    array(
                                        'asc'=>'programa ASC',
                                        'desc'=>'programa DESC',
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
     * @return Vetados the static model class
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
