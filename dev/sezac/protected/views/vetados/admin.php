<?php
$this->breadcrumbs=array(	
	Yii::t('app', '_LISTAVETADOS'),        
);
?>
<br>
<div align="right">
    <?php
    $this->widget('booster.widgets.TbButtonGroup', array(
        'size' => 'mini',
        'buttons' => array(            
            array(
                'icon' => 'print',
                'label' => Yii::t('app', '_IMPRIMIR'),
                'buttonType' => 'link',
                'url' => array('reportes/rptVetados'),                
            ),    
        )
    ));
    ?>
</div>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'vetados-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
                array(
                    'name'=>'beneficiario',
                    'value'=>'$data->beneficiario'
                ),		
		array(
                    'name'=>'programa',
                    'value'=>'$data->programa'
                ),
                'fecha',
),
)); ?>
