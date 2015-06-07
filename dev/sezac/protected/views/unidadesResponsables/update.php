<?php
$this->breadcrumbs=array(
	'Unidades Responsables'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List UnidadesResponsables','url'=>array('index')),
	array('label'=>'Create UnidadesResponsables','url'=>array('create')),
	array('label'=>'View UnidadesResponsables','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage UnidadesResponsables','url'=>array('admin')),
	);
	?>

	<h1>Update UnidadesResponsables <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>