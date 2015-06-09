<br>
<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('admin'),
	'Actualizar '.$model->nombre
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model,'arrDependencias'=>$arrDependencias,'arrUnidades'=>$arrUnidades,'arrAnios'=>$arrAnios)); ?>