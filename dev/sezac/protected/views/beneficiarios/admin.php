<?php
    $this->breadcrumbs=array(
            'Beneficiarios',
            'Listado',
            'Crear nuevo'=>array("create")
    );

?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'beneficiarios-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'nombre',
		'apellidoPaterno',
		'apellidoMaterno',
		'direccion',
		'telefono',
		/*
		'idOrganizacion',
		'idMunicipio',
		'rfc',
		*/
array(
    'class'=>'booster.widgets.TbButtonColumn',
    'template'=>'{editar} {eliminar}', 
    'buttons'=>array(
        'editar'=>array(
            'url'=>'Yii::app()->createUrl("beneficiarios/update",'
            .'array(Keycode::encriptar("id")=>'
            .'Keycode::encriptar($data->id)))',
            'label'=>Yii::t('app', 'Update'),
            'icon'=>'pencil',
            'size' => 'small',
        ),
        'eliminar'=>array(
            'url'=>'Yii::app()->createUrl("beneficiarios/delete",'
            . 'array(Keycode::encriptar("id")=>'
            . 'Keycode::encriptar($data->id)))',
            'label'=>Yii::t('app', 'Delete'),
            'icon'=>'trash',            
            'options' => array(
                'confirm' => 
                    Yii::t('app', 'Mensaje_Confirmar_Aceptar'),
                ),
         ),
    )
),
),
)); ?>
