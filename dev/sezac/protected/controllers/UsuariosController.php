<?php

class UsuariosController extends Controller{
    /**
    * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
    * using two-column layout. See 'protected/views/layouts/column2.php'.
    */
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
    

    /**
    * Specifies the access control rules.
    * This method is used by the 'accessControl' filter.
    * @return array access control rules
    */
   /* public function accessRules(){
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
        'actions'=>array('admin','delete'),
        'users'=>array('*'),
        ),
        array('deny',  // deny all users
        'users'=>array('*'),
        ),
        );
    }*/
     public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('view','create','update','admin','delete'),
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
     public function actionView(){
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
         $model=new Usuarios;
         $arrBeneficiarios = CHtml::listData(
            Beneficiarios::model()->findAll(),
            'id',
            'nombre'
        );
        if (isset($_POST["yt0"]) ) {
                    $this->redirect(array('admin'));
         }
        if(isset($_POST['Usuarios'])){
            $model->attributes=$_POST['Usuarios'];
            $model->password=$model->encriptarPassword($model->password);
            if($model->save()){
                
                Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro se creó correctamente.'));     
                $this->redirect(array('admin'));
            }
        }
        $this->render('create',array(
        'model'=>$model,
        'arrBeneficiarios'=>$arrBeneficiarios,
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
             $arrBeneficiarios = CHtml::listData(
                Beneficiarios::model()->findAll(),
                'id',
                'nombre'
            );
            $model=$this->loadModel($id);
            $password=$model->password;
            $model->password=FALSE;
            if (isset($_POST["yt0"]) ) {
                $this->redirect(array('admin'));
            }
            if(isset($_POST['Usuarios'])){
                $model->attributes=$_POST['Usuarios'];
                $model->password=$model->encriptarPassword($model->password);
                if(trim($model->password)==''){
                    $model->password=$password;
                    $model->password=$model->encriptarPassword($model->password);
                }
                if($model->save())
                    Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro se guardó correctamente.'));
                $this->redirect(array('admin'));
            }

            $this->render('update',array(
                'model'=>$model,
                'arrBeneficiarios'=>$arrBeneficiarios
            ));
        }
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
    $dataProvider=new CActiveDataProvider('Usuarios');
    $this->render('index',array(
    'dataProvider'=>$dataProvider,
    ));
    }

    /**
    * Manages all models.
    */
    public function actionAdmin()
    {
    $model=new Usuarios('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Usuarios']))
    $model->attributes=$_GET['Usuarios'];

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
        $model=Usuarios::model()->findByPk($id);
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
    if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
    {
    echo CActiveForm::validate($model);
    Yii::app()->end();
    }
    }
}
