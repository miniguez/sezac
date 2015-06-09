<?php
$this->breadcrumbs=array(
	'Organizaciones',
	'Listado',
        'Crear nueva'=>array("create")
);
?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'organizaciones-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
                /*
		'id',
                 */
		'nombre',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
