<?php
$this->breadcrumbs=array(
	'Programas',
	Yii::t('app', '_INCRIBIR'),
        
);
?>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'beneficiarios-grid',
'dataProvider'=>$model->searchBeneficiarioOrganizacion(),
'filter'=>$model,
'columns'=>array(        
		'nombre',
                'rfc',              
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

