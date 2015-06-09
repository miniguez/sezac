<br>
<?php
$this->breadcrumbs=array(
	'Encargados'=>array('admin'),
	'Create',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'arrDependencias'=>$arrDependencias)); ?>