<?php
    $this->breadcrumbs=array(
            'Usuarios'=>array('admin'),
            'Vista',
            $model->nombre
    );
?>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id',
		'usuario',
		//'password',
		'tipo',
		'nombre',
),
)); ?>
<?php echo CHtml::button('Cancelar', array('submit' => array('usuarios/admin'))); ?>
