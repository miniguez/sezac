<br>
<?php
$this->breadcrumbs=array(
	'Unidades responsables'=>array('admin'),
	'Actualizar '.$model->nombre
);
?>

<?php 
    echo $this->renderPartial(
            '_form',
            array(
                'model'=>$model,
                'arrDependencias'=>$arrDependencias,
                'arrEncargados'=>$arrEncargados
            )
    ); 
?>