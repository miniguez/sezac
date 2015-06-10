<?php

class AniosFiscalesController extends Controller
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
                'actions'=>array('index','create','update','admin','delete','getEncargados'),
                'expression'=>
                    ' Yii::app()->user->getState("tipo") == "Administrador"'
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
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new AniosFiscales;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

 if (isset($_POST["yt0"]) ) {
            $this->redirect(array('admin'));
        }

if(isset($_POST['AniosFiscales']))
{
    $model->attributes=$_POST['AniosFiscales'];
        if($model->save()){
        Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro se creó correctamente.'));     
        $this->redirect(array('admin'));
    }
}



$this->render('create',array(
'model'=>$model,
));
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

            if (isset($_POST["yt0"]) ) {
                $this->redirect(array('admin'));
            }
                    // Uncomment the following line if AJAX validation is needed
                    // $this->performAjaxValidation($model);

            if(isset($_POST['AniosFiscales']))
            {
            $model->attributes=$_POST['AniosFiscales'];
            if($model->save())
                Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro se guardó correctamente.'));
            $this->redirect(array('admin'));
            }

            $this->render('update',array(
            'model'=>$model,
            ));
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
$dataProvider=new CActiveDataProvider('AniosFiscales');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new AniosFiscales('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['AniosFiscales']))
$model->attributes=$_GET['AniosFiscales'];

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
$model=AniosFiscales::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='anios-fiscales-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
