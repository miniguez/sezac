<?php
$this->breadcrumbs=array(	
	Yii::t('app', '_LISTADOINSCRIPCIONES'),        
);
?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'programas-beneficiarios-adminBene-grid',
'dataProvider'=>$model->searchProgramasBeneficiario(Yii::app()->user->getState("idBeneficiario")),
'filter'=>$model,
'columns'=>array(	                
                array(
                    'name'=>'idPrograma',
                    'value'=>'$data->idPrograma0->nombre'
                ),						
                array(
                    'name'=>'idOrganizacion',
                    'value'=>'($data->idOrganizacion) ? $data->idOrganizacion0->nombre : ""'
                ),
                array(
                    'name'=>'fecha',
                    'value'=>'$data->fecha'
                ),
                array(
                    'name'=>'fechaFin',
                    'value'=>'$data->fechaFin'
                ),
		'estatus',

),
)); ?>
