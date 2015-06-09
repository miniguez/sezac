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
		array(
                    'name'=>'nombre',
                    'value'=>'$data->nombre." ".$data->apellidoPaterno." ".$data->apellidoMaterno'
                    
                ),
                array(
                    'name'=>'idMunicipio',
                    'value'=>'$data->idMunicipio0->nombre'
                    
                ),
                array(
                    'name'=>'idEstado',
                     'value'=>'$data->idMunicipio0->idEstado0->nombre'
                ),
		
		
array(
    'class'=>'booster.widgets.TbButtonColumn',
    'template'=>'{ver}{editar} {eliminar}', 
    'buttons'=>array(
        'ver'=>array(
            'url'=>'Yii::app()->createUrl("beneficiarios/view",'
            .'array(Keycode::encriptar("id")=>'
            .'Keycode::encriptar($data->id)))',
            'label'=>Yii::t('app', 'View'),
            'icon'=>'search',
            'size' => 'small',
        ),
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
