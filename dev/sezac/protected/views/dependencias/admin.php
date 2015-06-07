<?php
$this->breadcrumbs=array(
	'Dependencias',
	'Listado',
        'Crear nueva'=>array("create")
);

?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'dependencias-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'nombre',
		'abreviatura',
array(
    'class'=>'booster.widgets.TbButtonColumn',
    'template'=>'{editar} {eliminar}', 
    'buttons'=>array(
        'editar'=>array(
            'url'=>'Yii::app()->createUrl("dependencias/update",'
            .'array(Keycode::encriptar("id")=>'
            .'Keycode::encriptar($data->id)))',
            'label'=>Yii::t('app', 'Update'),
            'icon'=>'pencil',
            'size' => 'small',
        ),
        'eliminar'=>array(
            'url'=>'Yii::app()->createUrl("dependencias/delete",'
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
