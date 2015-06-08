<div class="form">
<?php $form=$this->beginWidget(
    'booster.widgets.TbActiveForm', array(
        'id'=>'dependencias-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well'),
    )
); ?>

<p class="help-block"><?php echo Yii::t('app', 'Fields with') ?>
<span class="required">*</span><?php echo Yii::t('app', 'are required.') ?></p>

<?php echo $form->errorSummary($model); ?>

<?php 
echo $form->textFieldGroup(
        $model,
        'nombre',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-4',
            ),            
        )
); 
?>

<?php              
    echo $form->select2Group(
        $model, 
        'idDependencia', 
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-4',
            ), 
            'widgetOptions' => array(
                'data' => $arrDependencias,
                'options' => array(
                    'placeholder' => 'Seleccione', 
                    'allowClear' => true,                     
                ),
                'htmlOptions' => array(                    
                    'ajax'=>array(
                        'type'=>'POST',
                        'dataType'=>'json',
                        'url'=>  CController::createUrl('unidadesResponsables/getEncargados'),
                        'beforeSend'=>'function() {                            
                            $("#UnidadesResponsables_idEncargado").find("option").remove();                                                        
                        }',
                        'success'=>"function(data) {
                            $('#UnidadesResponsables_idEncargado').html(data.encargados);                        
                        }",
                    ),
                ),
            )
        )
    );
?>
<?php              
    echo $form->select2Group(
        $model, 
        'idEncargado', 
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-4',
            ), 
            'widgetOptions' => array(
                'data' => $arrEncargados,
                'options' => array(
                    'placeholder' => 'Seleccione', 
                    'allowClear' => true,                     
                )                
            )
        )
    );
?>



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
</div>