<?php
$this->breadcrumbs=array(	
	Yii::t('app', '_LISTAVETADOS'),        
);
?>


<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'vetados-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(		
		'fecha',
		array(
                    'name'=>'programa',
                    'value'=>'$data->idProgramasBeneficiario0->idPrograma0->nombre'
                ),
                array(
                    'name'=>'beneficiario',
                    'value'=>'$data->idProgramasBeneficiario0->getBeneficiario()'
                )
),
)); ?>
