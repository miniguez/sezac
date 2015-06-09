<?php
$this->breadcrumbs=array(
	'Organizaciones'=>array('admin'),
	$model->nombre
);

?>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nombre',
),
)); ?>
