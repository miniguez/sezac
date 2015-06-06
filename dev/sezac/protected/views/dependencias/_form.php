<?php
/* @var $this DependenciasController */
/* @var $model Dependencias */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dependencias-form',	
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con<span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>180)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abreviatura'); ?>
		<?php echo $form->textField($model,'abreviatura',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'abreviatura'); ?>
	</div>

	<div class="row buttons">
                <?php echo CHtml::submitButton('Cancelar' ); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->