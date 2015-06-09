<?php
$this->breadcrumbs=array(
	'Organizaciones'=>array('admin'),
	$model->nombre
);

?>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
    /*
		'id',
     */
		'nombre',   
),
)); ?>


<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'organizaciones-grid',
'dataProvider'=>$model->search($model->id),
'filter'=>$model,
'columns'=>array(
    
		array(
                    'name'=>'id',
                   
                    'value'=>$model->beneficiarioses->nombre
                     
            ),
    
),
)); ?>