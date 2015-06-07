<?php
$this->breadcrumbs=array(
	'Años Fiscales',
	'Listado',
        'Crear nuevo'=>array("create")
);

?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'anios-fiscales-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'nombre',
array(
    'class'=>'booster.widgets.TbButtonColumn',
    'template'=>'{editar} {eliminar}', 
    'buttons'=>array(
        'editar'=>array(
            'url'=>'Yii::app()->createUrl("AniosFiscales/update",'
            .'array(Keycode::encriptar("id")=>'
            .'Keycode::encriptar($data->id)))',
            'label'=>Yii::t('app', 'Update'),
            'icon'=>'pencil',
            'size' => 'small',
        ),
        'eliminar'=>array(
            'url'=>'Yii::app()->createUrl("AniosFiscales/delete",'
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
