<?php

/**
 * This is the model class for table "Usuarios".
 *
 * The followings are the available columns in table 'Usuarios':
 *
 * @property string $id
 * @property string $usuario
 * @property string $password
 * @property string $tipo
 * @property string $nombre
 */
class Usuarios extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Usuarios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('usuario, password, tipo, nombre', 'required'),
        array('usuario', 'length', 'max'=>45),
        array('password', 'length', 'max'=>120),
        array('tipo', 'length', 'max'=>13),
        array('nombre', 'length', 'max'=>180),
        array('idBeneficiario', 'length', 'max'=>10),    
        // The following rule is used by search().
        // @todo Please remove those attributes that should not be searched.
        array('id, usuario, password, tipo, nombre, idBeneficiario', 'safe', 'on'=>'search'),
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
        'id' => 'ID',
        'usuario' => 'Usuario',
        'password' => 'Password',
        'tipo' => 'Tipo',
        'nombre' => 'Nombre',
            'idBeneficiario'=>'Beneficiario'
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
        $criteria->compare('usuario', $this->usuario, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('tipo', $this->tipo, true);
        $criteria->compare('nombre', $this->nombre, true);

        return new CActiveDataProvider(
            $this, array(
            'criteria'=>$criteria,
            )
        );
    }
    public function encriptarPassword($password){
        $passwordHash = password_hash(
            $password, 
            PASSWORD_BCRYPT, 
            array(
                'cost' => 10
            )    
        );
        return $passwordHash;
    }
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Usuarios the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
