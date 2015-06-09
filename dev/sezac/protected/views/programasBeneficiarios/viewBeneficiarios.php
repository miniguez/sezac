<?php
$this->breadcrumbs=array(
	'Programas'=>array("viewProgramas"),
	Yii::t('app', '_INCRIBIR')." a ".$modelPrograma->nombre,
        
);
?>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'beneficiarios-grid',
'dataProvider'=>$model->searchBeneficiarioOrganizacion(),
'filter'=>$model,
'columns'=>array(        
		'nombre',
                'rfc', 
                'tipo',
array(
    'class'=>'booster.widgets.TbButtonColumn',
    'template'=>'{inscribir} ', 
    'buttons'=>array(        
        'inscribir'=>array(
            'url'=>'Yii::app()->createUrl("programasBeneficiarios/inscribirBenfiOrg",'
            .'array(
                Keycode::encriptar("id")=>Keycode::encriptar($data->id),
                Keycode::encriptar("idPrograma")=>Keycode::encriptar('.$modelPrograma->id.'),
                Keycode::encriptar("tipo")=>Keycode::encriptar($data->tipo),
                )
             )',
            
            'label'=>Yii::t('app', '_INCRIBIR'),
            'icon'=>'ok',
            'size' => 'small',
        ),       
    )
),
),
)); ?>

