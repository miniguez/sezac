<?php
$this->breadcrumbs=array(
	'Unidades Responsables'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List UnidadesResponsables','url'=>array('index')),
array('label'=>'Manage UnidadesResponsables','url'=>array('admin')),
);
?>

<h1>Create UnidadesResponsables</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>