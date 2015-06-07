<?php
$this->breadcrumbs=array(
	'Unidades responsables',
	'Listado',
        'Crear nueva'=>array("create")
);
?>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'unidades-responsables-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(		
		'nombre',		
                array(
                    'name'=>'idDependencia',
                    'value'=>'$data->idDependencia0->nombre'
                ),
                array(
                    'name'=>'idEncargado',
                    'value'=>'$data->idEncargado0->nombre'
                ),		
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
