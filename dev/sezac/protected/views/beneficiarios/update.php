<?php
    $this->breadcrumbs=array(
            'Beneficiarios'=>array('admin'),
            'Actualizar '.$model->nombre
    );
?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>