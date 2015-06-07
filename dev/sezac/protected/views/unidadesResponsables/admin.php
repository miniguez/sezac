<?php
$this->breadcrumbs=array(
	'Unidades Responsables'=>array('index'),
	'Manage',
);

?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'unidades-responsables-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(		
		'nombre',
		'idDependecia',
		'idEncargado',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
