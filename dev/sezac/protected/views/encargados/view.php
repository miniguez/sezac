<?php
$this->breadcrumbs=array(
	'Encargados'=>array('admin'),
	$model->nombre
);

/*$this->menu=array(
array('label'=>'List Encargados','url'=>array('index')),
array('label'=>'Create Encargados','url'=>array('create')),
array('label'=>'Update Encargados','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Encargados','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Encargados','url'=>array('admin')),
);*/
?>


<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'nombre',
		'apellidoPaterno',
		'apellidoMaterno',
		'numEmpleado',
		'telefono',
                array (
                    'name'=>'idDependencia',
                    'value'=>$model->idDependencia0->nombre
                ), 
),
)); ?>