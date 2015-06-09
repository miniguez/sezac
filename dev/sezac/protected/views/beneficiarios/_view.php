<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellidoPaterno')); ?>:</b>
	<?php echo CHtml::encode($data->apellidoPaterno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellidoMaterno')); ?>:</b>
	<?php echo CHtml::encode($data->apellidoMaterno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrganizacion')); ?>:</b>
	<?php echo CHtml::encode($data->idOrganizacion); ?>
	<br />

     

        
</div>
<div class="form-actions">
            <?php $this->widget('booster.widgets.TbButton', array(
                            'buttonType'=>'submit',
                            'context'=>'danger',
                            'size' => 'small',
                            'label'=>'Cancelar',
                    )); ?>

    </div>