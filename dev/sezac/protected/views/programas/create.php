<br>
<?php
$this->breadcrumbs=array(
	'Programas'=>array('admin'),
	'Crear',
);

?>
<?php echo $this->renderPartial('_form', array('model'=>$model,'arrDependencias'=>$arrDependencias,'arrUnidades'=>$arrUnidades,'arrAnios'=>$arrAnios)); ?>