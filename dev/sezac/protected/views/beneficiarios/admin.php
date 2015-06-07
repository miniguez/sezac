<?php
    $this->breadcrumbs=array(
            'Beneficiarios',
            'Listado',
            'Crear nuevo'=>array("create")
    );

?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'beneficiarios-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'nombre',
		'apellidoPaterno',
		'apellidoMaterno',
		'direccion',
		'telefono',
		/*
		'idOrganizacion',
		'idMunicipio',
		'rfc',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
