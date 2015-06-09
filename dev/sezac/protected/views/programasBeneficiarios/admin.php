<?php
$this->breadcrumbs=array(	
	Yii::t('app', '_LISTADOINSCRIPCIONES'),        
);
?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'programas-beneficiarios-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(	                
                array(
                    'name'=>'idPrograma',
                    'value'=>'$data->idPrograma0->nombre'
                ),						
                array(
                    'name'=>'idOrganizacion',
                    'value'=>'($data->idOrganizacion) ? $data->idOrganizacion0->nombre : ""'
                ),
                array(
                    'name'=>'idBeneficiario',
                    'value'=>'($data->idBeneficiario) ? $data->idBeneficiario0->nombre : ""'
                ),
                array(
                    'name'=>'fecha',
                    'value'=>'$data->fecha'
                ),
		'estatus',
array(
    'class'=>'booster.widgets.TbButtonColumn',
    'template'=>'{concluir} {vetar}', 
    'buttons'=>array(
        'concluir'=>array(
            'url'=>'Yii::app()->createUrl("programasBeneficiarios/concluir",'
            .'array(Keycode::encriptar("id")=>'
            .'Keycode::encriptar($data->id)))',
            'label'=>Yii::t('app', '_CONCLUIR'),
            'icon'=>'ok-sign',            
            'options' => array(
                'confirm' => 
                    Yii::t('app', '_MENSAJECONFIRMARCONCLUIR'),
            ),
        ),
        'vetar'=>array(
            'url'=>'Yii::app()->createUrl("programasBeneficiarios/vetar",'
            . 'array(Keycode::encriptar("id")=>'
            . 'Keycode::encriptar($data->id)))',
            'label'=>Yii::t('app', '_VETAR'),
            'icon'=>'remove-sign',            
            'options' => array(
                'confirm' => 
                    Yii::t('app', '_MENSAJECONFIRMARVETAR'),
            ),
         ),
    )
),
),
)); ?>
