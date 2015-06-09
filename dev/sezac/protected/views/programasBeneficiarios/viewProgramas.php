<?php
$this->breadcrumbs=array(
	'Programas',
	Yii::t('app', '_INCRIBIR'),
        
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
    'class'=>'booster.widgets.TbButtonColumn',
    'template'=>'{inscribir} ', 
    'buttons'=>array(        
        'inscribir'=>array(
            'url'=>'Yii::app()->createUrl("programasBeneficiarios/viewBeneficiarios",'
            .'array(Keycode::encriptar("id")=>'
            .'Keycode::encriptar($data->id)))',
            'label'=>Yii::t('app', '_INCRIBIR'),
            'icon'=>'plus',
            'size' => 'small',
        ),       
    )
),
),
)); ?>
