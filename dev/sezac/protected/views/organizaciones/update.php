<br>
<?php
$this->breadcrumbs=array(
	'Organizaciones'=>array('admin'),
	'Actualizar '.$model->nombre
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>