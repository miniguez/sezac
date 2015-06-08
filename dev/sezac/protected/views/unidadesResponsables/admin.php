<?php
$this->breadcrumbs=array(
	'Unidades responsables',
	'Listado',
        'Crear nueva'=>array("create")
);
?>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'unidades-responsables-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(		
		'nombre',		
                array(
                    'name'=>'idDependencia',
                    'value'=>'$data->idEncargado0->idDependencia0->nombre'
                ),
                array(
                    'name'=>'idEncargado',
                    'value'=>'$data->idEncargado0->nombre." ".$data->idEncargado0->apellidoPaterno." ".$data->idEncargado0->apellidoMaterno'
                ),		
array(
    'class'=>'booster.widgets.TbButtonColumn',
    'template'=>'{editar} {eliminar}', 
    'buttons'=>array(
        'editar'=>array(
            'url'=>'Yii::app()->createUrl("unidadesResponsables/update",'
            .'array(Keycode::encriptar("id")=>'
            .'Keycode::encriptar($data->id)))',
            'label'=>Yii::t('app', 'Update'),
            'icon'=>'pencil',
            'size' => 'small',
        ),
        'eliminar'=>array(
            'url'=>'Yii::app()->createUrl("unidadesResponsables/delete",'
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
