<br>
<?php
$this->breadcrumbs=array(
	'Unidades responsables'=>array('admin'),
	'Crear',
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