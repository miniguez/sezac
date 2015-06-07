<?php
$this->breadcrumbs=array(
	'Beneficiarios',
);

$this->menu=array(
array('label'=>'Create Beneficiarios','url'=>array('create')),
array('label'=>'Manage Beneficiarios','url'=>array('admin')),
);
?>

<h1>Beneficiarioses</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
