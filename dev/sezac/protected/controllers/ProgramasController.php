<?php

class ProgramasController extends Controller
{
    /**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
    public $layout='//layouts/column2';

    /**
* @return array action filters
*/
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

    /**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
    public function accessRules()
    {        
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('index','create','update','admin','delete','getUnidades'),
                'expression'=>
                    ' Yii::app()->user->getState("tipo") == "Encargado"'
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
        $model=new Programas;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $arrDependencias = CHtml::listData(
            Dependencias::model()->findAll(),
            'id',
            'nombre'
        );
        $arrUnidades = array();
        $arrAnios = CHtml::listData(
            AniosFiscales::model()->findAll(),
            'id',
            'nombre'
        );
        if (isset($_POST["yt0"]) ) {
            $this->redirect(array('admin'));
        }
        if(isset($_POST['Programas'])) {
            $model->attributes=$_POST['Programas'];
            if($model->save()) {
                //Codigo para guardar img
                $pictures = CUploadedFile::getInstancesByName('pictures');
                if (isset($pictures) && count($pictures) > 0) {
                    foreach ($pictures as $picture => $pic) {
                        $guardar = $model->guardarArchivo($model, $pic);
                    }
                }
                Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro se creó correctamente.')); 
                $this->redirect(array('admin')); 
            }
        }

        $this->render(
            'create', array(
                'model'=>$model,
                'arrDependencias'=>$arrDependencias,
                'arrUnidades'=>$arrUnidades,
                'arrAnios'=>$arrAnios
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

            $model->idDependencia = $model->idUnidadesResponsable0->idEncargado0->idDependencia;
            $arrDependencias = CHtml::listData(            
                Dependencias::model()->findAll(),
                'id',
                'nombre'
            );
            $arrAnios = CHtml::listData(
                AniosFiscales::model()->findAll(),
                'id',
                'nombre'
            );
            $criteria=new CDbCriteria;
            $criteria->with = array('idEncargado0');
            $criteria->condition='idEncargado0.idDependencia ='.$model->idDependencia;
            $criteria->group="t.id";
            $arrUnidades = CHtml::listData(
                UnidadesResponsables::model()->findAll($criteria),
                'id',
                'nombre'
            );
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);
            if (isset($_POST["yt0"]) ) {
                $this->redirect(array('admin'));
            }
            if(isset($_POST['Programas'])) {
                $model->attributes=$_POST['Programas'];
                if($model->save()) {
                    $pictures = CUploadedFile::getInstancesByName('pictures');
                    if (isset($pictures) && count($pictures) > 0) {
                        foreach ($pictures as $picture => $pic) {
                            $guardar = $model->guardarArchivo($model, $pic);
                        }
                    }                    
                    Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro se guardó correctamente.'));
                    $this->redirect(array('admin')); 
                }
            }

            $this->render(
                'update', array(
                    'model'=>$model,
                    'arrDependencias'=>$arrDependencias,
                    'arrUnidades'=>$arrUnidades,
                    'arrAnios'=>$arrAnios
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
                $archivo = $model->archivo;
                $model->delete();  
                Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro fue eliminado.')); 
                Programas::model()->eliminar($archivo);
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
        $dataProvider=new CActiveDataProvider('Programas');
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
        $model=new Programas('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Programas'])) {
            $model->attributes=$_GET['Programas']; 
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
        $model=Programas::model()->findByPk($id);
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
        if(isset($_POST['ajax']) && $_POST['ajax']==='programas-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionGetUnidades() {
        $idDependencia = $_POST['Programas']['idDependencia'];      
        $criteria=new CDbCriteria;
        $criteria->with = array('idEncargado0');
        $criteria->condition='idEncargado0.idDependencia ='.$idDependencia;
        $criteria->group="t.id";
        $unidades = UnidadesResponsables::model()->findAll($criteria);     
        
        $unidadesOptions = '';
        foreach ($unidades as  $unidad) {
            $unidadesOptions .= CHtml::tag('option', array('value' => $unidad->id), CHtml::encode($unidad->nombre), true);
        }

        echo CJSON::encode(
                array(
                    'status' => 'success',
                    'unidades' => $unidadesOptions,
                )
        );
    }
}
