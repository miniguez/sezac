<?php
/* @var $this DependenciasController */
/* @var $model Dependencias */

$this->breadcrumbs=array(
        'Administrador',
	'Dependencias',
	'Listado',
        'Crear nueva'=>array('create')
);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dependencias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
		'nombre',
		'abreviatura',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
