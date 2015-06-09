<br>
<?php
$this->breadcrumbs=array(
	'Encargados '=>array('admin'),
	'Actualizar '.$model->nombre
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model , 'arrDependencias'=>$arrDependencias)); ?>