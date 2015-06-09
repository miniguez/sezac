<?php
$this->breadcrumbs=array(
	'Organizaciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Organizaciones','url'=>array('index')),
	array('label'=>'Create Organizaciones','url'=>array('create')),
	array('label'=>'View Organizaciones','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Organizaciones','url'=>array('admin')),
	);
	?>

	<h1>Update Organizaciones <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>