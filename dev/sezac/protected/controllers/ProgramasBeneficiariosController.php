<?php

class ProgramasBeneficiariosController extends Controller
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
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','viewProgramas','viewBeneficiarios','inscribirBenfiOrg','concluir','vetar'),
                'expression'=>
                    ' Yii::app()->user->getState("tipo") == "Encargado"'
            ),
             array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('adminBene'),
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
        $model=new ProgramasBeneficiarios;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['ProgramasBeneficiarios'])) {
            $model->attributes=$_POST['ProgramasBeneficiarios'];
            if($model->save()) {
                $this->redirect(array('view','id'=>$model->id)); 
            }
        }

        $this->render(
            'create', array(
            'model'=>$model,
            )
        );
    }

    /**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['ProgramasBeneficiarios'])) {
            $model->attributes=$_POST['ProgramasBeneficiarios'];
            if($model->save()) {
                $this->redirect(array('view','id'=>$model->id)); 
            }
        }

        $this->render(
            'update', array(
            'model'=>$model,
            )
        );
    }

    /**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin')); 
            }
        }
        else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.'); 
        }
    }

    /**
* Lists all models.
*/
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('ProgramasBeneficiarios');
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
        $model=new ProgramasBeneficiarios('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['ProgramasBeneficiarios'])) {
            $model->attributes=$_GET['ProgramasBeneficiarios']; 
        }

        $this->render(
            'admin', array(
            'model'=>$model,
            )
        );
    }
    
    public function actionAdminBene()
    {
        $model=new ProgramasBeneficiarios('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['ProgramasBeneficiarios'])) {
            $model->attributes=$_GET['ProgramasBeneficiarios']; 
        }

        $this->render(
            'adminBene', array(
            'model'=>$model,
            )
        );
    }



    /**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='programas-beneficiarios-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionViewProgramas()
    {
        $model=new Programas('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Programas'])) {
            $model->attributes=$_GET['Programas']; 
        }
        
        $this->render(
            'viewProgramas', array(
            'model'=>$model,
            )
        );
    }
    
    public function actionViewBeneficiarios()
    {
        
        if (isset($_GET[Keycode::encriptar("id")])) {
            $id = $_GET[Keycode::encriptar("id")];            
            $id = Keycode::desencriptar($id);
            $modelPrograma=Programas::model()->findByPk($id);
            if($modelPrograma===null) {
                throw new CHttpException(404, 'The requested page does not exist.'); 
            }
            $model=new Beneficiarios('searchBeneficiariosOrganizaciones');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Beneficiarios'])) {
                $model->attributes=$_GET['Beneficiarios']; 
            }

            $this->render(
                'viewBeneficiarios', array(
                    'model'=>$model,
                    'modelPrograma'=>$modelPrograma
                )
            );
        } else {
            throw new CHttpException(404, 'The requested page does not exist.'); 
        }
    }
    
    public function actionInscribirBenfiOrg()
    {
        if (isset($_GET[Keycode::encriptar("id")]) && isset($_GET[Keycode::encriptar("idPrograma")]) && isset($_GET[Keycode::encriptar("tipo")])) {
              $tipo = Keycode::desencriptar($_GET[Keycode::encriptar("tipo")]);
              $id = Keycode::desencriptar($_GET[Keycode::encriptar("id")]);
              $idPrograma = Keycode::desencriptar($_GET[Keycode::encriptar("idPrograma")]);
              $model = new ProgramasBeneficiarios();
              $model->tipo = $tipo;
              $model->estatus = "EnProceso";
              $model->fecha = date("Y-m-d");
              $model->idPrograma=$idPrograma;
              if ($tipo=="Organizacion") {
                  $modelBenefi = Organizaciones::model()->findByPk($id);
                  $model->idOrganizacion = $modelBenefi->id;
              } else if($tipo=="Beneficiario") {
                  $modelBenefi = Beneficiarios::model()->findByPk($id);
                  $model->idBeneficiario = $modelBenefi->id;
              }
              if ($model->save()) {
                  Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Registro se creó correctamente.')); 
                  $this->redirect(array('viewProgramas'));
              }

        } else {
            throw new CHttpException(404, 'The requested page does not exist.'); 
        }        
    }
    
    public function actionConcluir() 
    {
         if (isset($_GET[Keycode::encriptar("id")])) {
             $id = $_GET[Keycode::encriptar("id")];
             $model=$this->loadModel($id);
             $model->estatus ="Concluyo";
             $model->fechaFin = date("Y-m-d");
             if ($model->save()) {
                 $this->redirect(array('admin'));
                 Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'El Programa se conluyó correctamente.')); 
             }
             
         } else {
             throw new CHttpException(404, 'The requested page does not exist.'); 
         }
    }
    
    public function actionVetar() 
    {
         if (isset($_GET[Keycode::encriptar("id")])) {
             $id = $_GET[Keycode::encriptar("id")];
             $model=$this->loadModel($id);
             $model->estatus ="NoConcluyo";
             $model->fechaFin = date("Y-m-d");
             if ($model->save() && $model->vetar()) {
                 Yii::app()->user->setFlash('info', array('title' => 'Operación exitosa!', 'text' => 'La organización o beneficiario han quedado vetados.')); 
                 $this->redirect(array('admin'));                 
             } else {
                 Yii::app()->user->setFlash('error', array('title' => 'Error!', 'text' => 'Error en operación')); 
             }
             
         } else {
             throw new CHttpException(404, 'The requested page does not exist.'); 
         }
    }
    public function loadModel($id)
    {
        $id = Keycode::desencriptar($id);
        $model=ProgramasBeneficiarios::model()->findByPk($id);
        if($model===null) {
            throw new CHttpException(404, 'The requested page does not exist.'); 
        }
        return $model;
    }
}
