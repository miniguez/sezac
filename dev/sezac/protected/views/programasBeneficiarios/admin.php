<?php
$this->breadcrumbs=array(
	'Programas Beneficiarioses'=>array('index'),
	'Manage',
);
?>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'programas-beneficiarios-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'tipo',
		'estatus',
		'idPrograma',
		'idOrganizacion',
		'idBeneficiario',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
