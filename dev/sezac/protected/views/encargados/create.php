<br>
<?php
$this->breadcrumbs=array(
	'Encargados'=>array('admin'),
	'Crear',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'arrDependencias'=>$arrDependencias)); ?>