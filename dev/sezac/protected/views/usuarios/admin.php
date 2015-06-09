<?php
$this->breadcrumbs=array(
	'Usuarios',
	'Listado',
        'Crear nuevo'=>array("create")
);
?>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'usuarios-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id',
                'nombre',
		//'usuario',
		//'password',
		'tipo',
		//'nombre',
array(
    'class'=>'booster.widgets.TbButtonColumn',
    'template'=>'{ver}{editar} {eliminar}', 
    'buttons'=>array(
        'ver'=>array(
            'url'=>'Yii::app()->createUrl("Usuarios/view",'
            .'array(Keycode::encriptar("id")=>'
            .'Keycode::encriptar($data->id)))',
            'label'=>Yii::t('app', 'View'),
            'icon'=>'search',
            'size' => 'small',
        ),
        'editar'=>array(
            'url'=>'Yii::app()->createUrl("Usuarios/update",'
            .'array(Keycode::encriptar("id")=>'
            .'Keycode::encriptar($data->id)))',
            'label'=>Yii::t('app', 'Update'),
            'icon'=>'pencil',
            'size' => 'small',
        ),
        'eliminar'=>array(
            'url'=>'Yii::app()->createUrl("Usuarios/delete",'
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
