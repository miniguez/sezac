<?php
/* @var $this DependenciasController */
/* @var $model Dependencias */

$this->breadcrumbs=array(
        'Administrador',
	'Dependencias'=>array('admin'),
	'Crear',
);

?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>