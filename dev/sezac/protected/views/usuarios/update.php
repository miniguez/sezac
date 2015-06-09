<?php
    $this->breadcrumbs=array(
            'Usuarios'=>array('admin'),
            'Actualizar '.$model->nombre
    );
?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>