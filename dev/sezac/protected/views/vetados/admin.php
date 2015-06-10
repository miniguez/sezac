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
