<?php
/* @var $this DependenciasController */
/* @var $model Dependencias */
$this->breadcrumbs=array(
        'Administrador',
	'Dependencias'=>array('admin'),
	'Actualizar '.$model->abreviatura,
);


?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>