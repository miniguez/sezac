<?php
$this->breadcrumbs=array(
	'Organizaciones'=>array('admin'),
	$model->nombre
);

?>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'nombre',   
),
)); ?>


<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'organizaciones-grid',
'dataProvider'=>$modelbeneficiarios->search($model->id),
'filter'=>$modelbeneficiarios,
'columns'=>array(
		array(
                    'name'=>'nombre',                  
                     'value'=>'$data->nombre'
                   
            ),
),
)); ?>