<?php
$this->breadcrumbs=array(
	'Dependencias',
	'Listado',
        'Crear nueva'=>array("create")
);

?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'dependencias-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		
		'nombre',
		'abreviatura',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
