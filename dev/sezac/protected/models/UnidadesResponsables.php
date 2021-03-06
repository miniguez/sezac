<?php

/**
 * This is the model class for table "UnidadesResponsables".
 *
 * The followings are the available columns in table 'UnidadesResponsables':
 *
 * @property string $id
 * @property string $nombre
 * @property string $idDependencia
 * @property string $idEncargado
 *
 * The followings are the available model relations:
 * @property Programas[] $programases
 * @property Dependecias $idDependencia0
 * @property Encargados $idEncargado0
 */
class UnidadesResponsables extends CActiveRecord
{
    public $idDependencia;
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
        array('nombre, idDependencia, idEncargado', 'required'),
        array('nombre', 'length', 'max'=>45),
        array('idDependencia, idEncargado', 'length', 'max'=>10),
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, nombre, idDependencia, idEncargado', 'safe', 'on'=>'search'),
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
        'idDependencia' => 'Dependencia',
        'idEncargado' => 'Encargado',
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
        $criteria->with = array('idEncargado0.idDependencia0');
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('idDependencia0.nombre', $this->idDependencia, true);
        $criteria->compare('idEncargado0.nombre', $this->idEncargado, true);

        return new CActiveDataProvider(
            $this, array(
                'criteria'=>$criteria,
                'sort'=> array(
                    'defaultOrder' => 't.id DESC',
                    'attributes'=>
                        array(
                            'idDependencia'=>
                                array(
                                    'asc'=>'idDependencia0.nombre ASC',
                                    'desc'=>'idDependencia0.nombre DESC',
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
     * @return UnidadesResponsables the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * funcion para obetener los ecargados de una dependencia 
     * @param int $idDependencia
     * @return array
     */
    public function getEncargados($idDependencia) {
        $encargados = Encargados::model()->findAll(
                'idDependencia=:param1 ', array(
                ':param1' => $idDependencia
                    )
        ); 
        $arrEncargados = array();
        foreach($encargados as $encargado) {
            $arrEncargados[$encargado->id] = $encargado->nombre." ".$encargado->apellidoPaterno." ".$encargado->apellidoMaterno;
        }
        return $arrEncargados;
    }
}
