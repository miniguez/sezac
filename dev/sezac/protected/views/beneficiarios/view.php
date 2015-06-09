<?php
$this->breadcrumbs=array(
	'Beneficiarios'=>array('admin'),
	$model->nombre,
);

/*$this->menu=array(
array('label'=>'List Beneficiarios','url'=>array('index')),
array('label'=>'Create Beneficiarios','url'=>array('create')),
array('label'=>'Update Beneficiarios','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Beneficiarios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Beneficiarios','url'=>array('admin')),
);*/
?>


<?php $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(

                    'nombre',
                    'apellidoPaterno',
                    'apellidoMaterno',
                    'direccion',
                    'telefono',
                    'rfc',
                    array(
                        'name'=>'idMunicipio',
                        'value'=>$model->idMunicipio0->nombre

                    ),
                    array(
                        'name'=>'idEstado',
                         'value'=>$model->idMunicipio0->idEstado0->nombre
                    ),

    ),
    ));   
?>
<?php echo CHtml::button('Cancelar', array('submit' => array('beneficiarios/admin'))); ?>


