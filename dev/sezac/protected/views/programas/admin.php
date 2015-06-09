<?php
$this->breadcrumbs=array(
	'Programas',
	'Listado',
        'Crear nuevo'=>array("create")
);
?>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'programas-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(		
		'nombre',
                array(
                    'name'=>'idUnidadesResponsable',
                    'value'=>'$data->idUnidadesResponsable0->nombre'
                ),
		array(
                    'name'=>'idAniosFiscale',
                    'value'=>'$data->idAniosFiscale0->nombre'
                ),
                array(                    
                    'htmlOptions' => array('width' => '30', 'style' => 'text-align:center;'),
                    'filter' => false,
                    'name'=>'archivo',
                    'type'=>'raw',
                    'value'=>'$data->archivo ? CHtml::link(CHtml::image(Yii::app()->request->baseUrl . "/images/icon_pdf.png", "image", array("width"=>16)), Yii::app()->request->baseUrl . "/filesAdjuntos/$data->archivo", array("class"=>"dev","target" => "_blank")):""'
                ),
    
array(
    'class'=>'booster.widgets.TbButtonColumn',
    'template'=>'{editar} {eliminar}', 
    'buttons'=>array(        
        'editar'=>array(
            'url'=>'Yii::app()->createUrl("programas/update",'
            .'array(Keycode::encriptar("id")=>'
            .'Keycode::encriptar($data->id)))',
            'label'=>Yii::t('app', 'Update'),
            'icon'=>'pencil',
            'size' => 'small',
        ),
        'eliminar'=>array(
            'url'=>'Yii::app()->createUrl("programas/delete",'
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
