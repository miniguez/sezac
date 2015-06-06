<br>
<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('admin'),
	'Actualizar '.$model->abreviatura
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>