<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ReportesController extends Controller
{
    /**
    * @var string the default layout for the views. Defaults to 
    * '//layouts/column2', meaning
    * using two-column layout. See 'protected/views/layouts/column2.php'.
    */
    public $layout='//layouts/column1';

    public function behaviors()
    {
        return array(
            'eexcelview'=>array(
                'class'=>'ext.eexcelview.EExcelBehavior',
            ),
        );
    }	
    
    /**
    * @return array action filters
    */
    public function filters()
    {
        return array(
            array(
                'application.filters.YXssFilter',
                'clean'   => '*',
                'tags'    => 'strict',
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
            array(
                'allow',
                'actions'=>array('rptInscripciones','rptVetados'),
                'expression'=>
                'Yii::app()->user->getState("tipo") == "Encargado"'
                
            ),          
            array('deny',
                'users'=>array('*'),
            ),
        );
    }

    public function actionRptInscripciones() 
    {       
        $objResultados = ProgramasBeneficiarios::model()->imprimeReporte();
        if ($objResultados) {
            // Export it
            $this->toExcel($objResultados, array(
                'a1::Programa',
                'a2::Organización',
                'a3::Beneficiario',
                'a4::Fecha inicio',
                'a5::Fecha final',
                'a6::Estatus',                
            ), 
                Yii::t('app', 'Inscripciones'), array(
                    'creator' => 'Administrator',
                    'title'=>'Inscripciones',
                ), 'Excel5'
            );
                    

        }        
    }

    public function actionRptVetados() 
    {       
        $objResultados = ProgramasBeneficiarios::model()->vetados();
        if ($objResultados) {
            // Export it
            $this->toExcel($objResultados, array(
                'a1::Organización o Beneficiario',
                'a2::Programa',
                'a3::Fecha',                                
            ), 
                Yii::t('app', 'Inscripciones'), array(
                    'creator' => 'Administrator',
                    'title'=>'Inscripciones',
                ), 'Excel5'
            );
                    

        }        
    }
}
