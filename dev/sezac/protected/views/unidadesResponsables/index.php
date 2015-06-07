<?php
$this->breadcrumbs=array(
	'Unidades Responsables',
);

$this->menu=array(
array('label'=>'Create UnidadesResponsables','url'=>array('create')),
array('label'=>'Manage UnidadesResponsables','url'=>array('admin')),
);
?>

<h1>Unidades Responsables</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
