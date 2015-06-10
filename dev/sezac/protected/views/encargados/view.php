<?php
$this->breadcrumbs=array(
	'Encargados'=>array('admin'),
	$model->nombre
);


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

<?php echo CHtml::button('Cancelar', array('submit' => array('admin'))); ?>