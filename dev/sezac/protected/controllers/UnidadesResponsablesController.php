<?php

class UnidadesResponsablesController extends Controller
{
    /**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
    public $layout='//layouts/column2';

    /**
* @return array action filters
*/
    public function filters()
    {
        return array(
        'accessControl', // perform access control for CRUD operations
        );
    }

    /**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
    public function accessRules()
    {
        return array(
        array('allow',  // allow all users to perform 'index' and 'view' actions
        'actions'=>array('index','view'),
        'users'=>array('*'),
        ),
        array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update'),
        'users'=>array('*'),
        ),
        array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('admin','delete','getEncargados'),
        'users'=>array('*'),
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
    public function actionView($id)
    {
        $this->render(
            'view', array(
            'model'=>$this->loadModel($id),
            )
        );
    }

    /**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
    public function actionCreate()
    {
        $model=new UnidadesResponsables;
        $arrDependencias = CHtml::listData(
            Dependencias::model()->findAll(),
            'id',
            'nombre'
        );
        $arrEncargados = array();
        if (isset($_POST["yt0"]) ) {
            $this->redirect(array('admin'));
        }
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['UnidadesResponsables'])) {
            $model->attributes=$_POST['UnidadesResponsables'];
            if($model->save()) {
                Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro se creó correctamente.')); 
                $this->redirect(array('admin')); 
            }
        }

        $this->render(
            'create', array(
                'model'=>$model,
                'arrDependencias'=>$arrDependencias,
                'arrEncargados'=>$arrEncargados
            )
        );
    }

    /**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
    public function actionUpdate()
    {       
        
        if (isset($_GET[Keycode::encriptar("id")])) {
            $id = $_GET[Keycode::encriptar("id")];
            $model=$this->loadModel($id);

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);
            if (isset($_POST["yt0"]) ) {
                $this->redirect(array('admin'));
            }
            
            $arrDependencias = CHtml::listData(
                Dependencias::model()->findAll(),
                'id',
                'nombre'
            );
            $model->idDependencia = $model->idEncargado0->idDependencia;
            $arrEncargados = UnidadesResponsables::model()->getEncargados($model->idDependencia);
            if(isset($_POST['UnidadesResponsables'])) {
                $model->attributes=$_POST['UnidadesResponsables'];
                if($model->save()) {
                    Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro se guardó correctamente.'));
                    $this->redirect(array('admin')); 
                }
            }
            $this->render(
            'update', array(
                'model'=>$model,
                'arrDependencias'=>$arrDependencias,
                'arrEncargados'=>$arrEncargados
            )
            );
            
        }        
    }

    /** 
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
    public function actionDelete()
    {
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
        $dataProvider=new CActiveDataProvider('UnidadesResponsables');
        $this->render(
            'index', array(
            'dataProvider'=>$dataProvider,
            )
        );
    }

    /**
* Manages all models.
*/
    public function actionAdmin()
    {
        $model=new UnidadesResponsables('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['UnidadesResponsables'])) {
            $model->attributes=$_GET['UnidadesResponsables']; 
        }

        $this->render(
            'admin', array(
            'model'=>$model,
            )
        );
    }

    /**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
    public function loadModel($id)
    {
        $id = Keycode::desencriptar($id);
        $model=UnidadesResponsables::model()->findByPk($id);
        if($model===null) {
            throw new CHttpException(404, 'The requested page does not exist.'); 
        }
        return $model;
    }

    /**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='unidades-responsables-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionGetEncargados() {
        $idDependencia = $_POST['UnidadesResponsables']['idDependencia'];      
        $encargados = Encargados::model()->findAll(
                'idDependencia=:param1 ', array(
                ':param1' => $idDependencia
                    )
        );       

        $encargadosOptions = '';
        foreach ($encargados as  $encargado) {
            $encargadosOptions .= CHtml::tag('option', array('value' => $encargado->id), CHtml::encode($encargado->nombre." ".$encargado->apellidoPaterno." ".$encargado->apellidoMaterno), true);
        }

        echo CJSON::encode(
                array(
                    'status' => 'success',
                    'encargados' => $encargadosOptions,
                )
        );
    }
}
