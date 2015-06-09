
<div class="form">
<?php $form=$this->beginWidget(
    'booster.widgets.TbActiveForm', array(
        'id'=>'beneficiarios1-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well'),
    )
); ?>

<p class="help-block"><?php echo Yii::t('app', 'Fields with') ?>
<span class="required">*</span><?php echo Yii::t('app', 'are required.') ?></p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>80)))); ?>

	<?php echo $form->textFieldGroup($model,'apellidoPaterno',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>80)))); ?>

	<?php echo $form->textFieldGroup($model,'apellidoMaterno',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>80)))); ?>

	<?php echo $form->textFieldGroup($model,'direccion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>180)))); ?>

	<?php echo $form->textFieldGroup($model,'telefono',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>18)))); ?>
        <?php echo $form->textFieldGroup($model,'rfc',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>18)))); ?>
        <div class="form-actions">
                <?php $this->widget('booster.widgets.TbButton', array(
                                'buttonType'=>'submit',
                                'context'=>'danger',
                                'size' => 'small',
                                'label'=>'Cancelar',
                        )); ?>
                <?php $this->widget('booster.widgets.TbButton', array(
                                'buttonType'=>'submit',
                                'context'=>'success',
                                'size' => 'small',
                                'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
                        )); ?>
        </div>

<?php $this->endWidget(); ?>
