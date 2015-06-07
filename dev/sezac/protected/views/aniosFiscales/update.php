<br>
<?php
$this->breadcrumbs=array(
	'Años Fiscales'=>array('admin'),
	'Actualizar '.$model->nombre
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>