<?php

class BeneficiariosController extends Controller
{

    public $layout='//layouts/column2';
   public function filters() {
        return array(
            array(
                'application.filters.YXssFilter',
                'clean' => '*',
                'tags' => 'strict',
                'actions' => 'all'
            ), 'accessControl',
        );
    }
    
   public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('index','view','create','update','admin','delete','getMunicipios'),
                'expression'=>
                    ' Yii::app()->user->getState("tipo") == "Encargado"'
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('actionFormBene','formBene'),
                'expression'=>
                    ' Yii::app()->user->getState("tipo") == "Beneficiario"'
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );                     
    }

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
    public function actionView()
    {
        if (isset($_GET[Keycode::encriptar("id")])) {
                $id = $_GET[Keycode::encriptar("id")];
                $this->render('view',array(
                'model'=>$this->loadModel($id),
                ));
               
        }
        
         
    }

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
    public function actionCreate(){
        $model=new Beneficiarios;
        $arrBeneficiarios = CHtml::listData(
            Organizaciones::model()->findAll(),
            'id',
            'nombre'
        );
        $arrEstados = CHtml::listData(
            Estados::model()->findAll(),
            'id',
            'nombre'
        );
        $arrMunicipios = array();
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST["yt0"]) ) {
            $this->redirect(array('admin'));
        }
        if(isset($_POST['Beneficiarios']))
        {
        $model->attributes=$_POST['Beneficiarios'];

        if($model->save()){
            Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro se creó correctamente.'));     
            $this->redirect(array('admin'));
        }}
        $this->render('create',array(
        'model'=>$model,
        'arrBeneficiarios'=>$arrBeneficiarios,
        'arrEstados'=>$arrEstados,
        'arrMunicipios'=>$arrMunicipios
        
        ));
    }

    /**
    * Updates a particular model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $id the ID of the model to be updated
    */
    public function actionUpdate(){
        if (isset($_GET[Keycode::encriptar("id")])) {
                $id = $_GET[Keycode::encriptar("id")];
                $model=$this->loadModel($id);
                $model->idEstado=$model->idMunicipio0->idEstado;
                
                $arrBeneficiarios = CHtml::listData(
                    Organizaciones::model()->findAll(),
                    'id',
                    'nombre'
                );
                $arrEstados = CHtml::listData(
                    Estados::model()->findAll(),
                    'id',
                    'nombre'
                );
                 $arrMunicipios = CHtml::listData(
                    Municipios::model()->findAll( 
                            'idEstado=:param1',
                            array(
                                ':param1'=>$model->idEstado
                            )
                            
                            ),
                    'id',
                    'nombre'
                );

                if (isset($_POST["yt0"]) ) {
                    $this->redirect(array('admin'));
                }
                        // Uncomment the following line if AJAX validation is needed
                        // $this->performAjaxValidation($model);

                if(isset($_POST['Beneficiarios']))
                {
                $model->attributes=$_POST['Beneficiarios'];
                if($model->save())
                    Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro se guardó correctamente.'));
                $this->redirect(array('admin'));
                }

                $this->render('update',array(
                    'model'=>$model,
                    'arrBeneficiarios'=>$arrBeneficiarios,
                    'arrEstados'=>$arrEstados,
                    'arrMunicipios'=>$arrMunicipios
                ));
         }

    }
    public function actionFormBene(){
                //Yii::app()->user->getState("tipo")
                $id = 1;
                $model=Beneficiarios::model()->findByPK($id);
                $model->idEstado=$model->idMunicipio0->idEstado;
                
                $arrBeneficiarios = CHtml::listData(
                    Organizaciones::model()->findAll(),
                    'id',
                    'nombre'
                );
                $arrEstados = CHtml::listData(
                    Estados::model()->findAll(),
                    'id',
                    'nombre'
                );
                 $arrMunicipios = CHtml::listData(
                    Municipios::model()->findAll( 
                            'idEstado=:param1',
                            array(
                                ':param1'=>$model->idEstado
                            )    
                     ),
                    'id',
                    'nombre'
                );

                if (isset($_POST["yt0"]) ) {
                    $this->redirect(array('site/index'));
                }
                        // Uncomment the following line if AJAX validation is needed
                        // $this->performAjaxValidation($model);

                if(isset($_POST['Beneficiarios']))
                {
                $model->attributes=$_POST['Beneficiarios'];
                if($model->save())
                    Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro se guardó correctamente.'));
                $this->redirect(array('site/index'));
                }
                
                $this->render('formBene',array(
                   'model'=>$model,
                   // 'arrBeneficiarios'=>$arrBeneficiarios,
                   // 'arrEstados'=>$arrEstados,
                   // 'arrMunicipios'=>$arrMunicipios
                ));
         
    }

    /**
    * Deletes a particular model.
    * If deletion is successful, the browser will be redirected to the 'admin' page.
    * @param integer $id the ID of the model to be deleted
    */
    public function actionDelete(){
        if (isset($_GET[Keycode::encriptar("id")])) {
                $id = $_GET[Keycode::encriptar("id")];
                $model = $this->loadModel($id);
                try {
                    $model->delete();  
                    Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro fue eliminado.')); 
                    $this->redirect(array('admin'));
                } catch (Exception $e) {
                    Yii::app()->user->setFlash('danger', array('title' => 'Error!', 'text' => 'El Registro no puede ser eliminado.'));
                    $this->redirect(array('admin'));
                }
            }
  
    }

    /**
    * Lists all models.
    */
    public function actionIndex()
    {
    $dataProvider=new CActiveDataProvider('Beneficiarios');
    $this->render('index',array(
    'dataProvider'=>$dataProvider,
    ));
    }

    /**
    * Manages all models.
    */
    public function actionAdmin()
    {
    $model=new Beneficiarios('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Beneficiarios']))
    $model->attributes=$_GET['Beneficiarios'];

    $this->render('admin',array(
    'model'=>$model,
    ));
    }

    /**
    * Returns the data model based on the primary key given in the GET variable.
    * If the data model is not found, an HTTP exception will be raised.
    * @param integer the ID of the model to be loaded
    */
    public function loadModel($id)
    {   
        $id = Keycode::desencriptar($id);
        $model=Beneficiarios::model()->findByPk($id);
        if($model===null)
        throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
    protected function performAjaxValidation($model)
    {
    if(isset($_POST['ajax']) && $_POST['ajax']==='beneficiarios-form')
    {
    echo CActiveForm::validate($model);
    Yii::app()->end();
    }
    }
    
       public function actionGetMunicipios() {
        $idEstado = $_POST['Beneficiarios']['idEstado'];
        $municipios = Municipios::model()->findAll(
                'idEstado=:param1 ', array(
                ':param1' => $idEstado
                    )
        );       

        $municipiosOptions = '';
        foreach ($municipios as  $municipio) {
            $municipiosOptions .= CHtml::tag('option', array('value' => $municipio->id), CHtml::encode($municipio->nombre), true);
        }

        echo CJSON::encode(
                array(
                    'status' => 'success',
                    'municipios' => $municipiosOptions,
                )
        );
    }
}
