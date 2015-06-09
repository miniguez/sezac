

<div class="form">
<?php $form=$this->beginWidget(
    'booster.widgets.TbActiveForm', array(
        'id'=>'beneficiarios-form',
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

	
        <?php              
            echo $form->dropDownListGroup(
                $model, 
                'idOrganizacion', 
                array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-4',
                    ), 
                    'widgetOptions' => array(
                        'data' => $arrBeneficiarios,
                        'options' => array(
                            'placeholder' => 'Seleccione', 
                            'allowClear' => true,                     
                        )                
                    )
                )
            );
        ?>

        
        <?php              
            echo $form->dropDownListGroup(
                $model, 
                'idEstado', 
                array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-4',
                    ), 
                    'widgetOptions' => array(
                        'data' => $arrEstados,
                        'options' => array(
                            'placeholder' => 'Seleccione', 
                            'allowClear' => true,                     
                        ),
                        'htmlOptions' => array(                    
                            'ajax'=>array(
                                'type'=>'POST',
                                'dataType'=>'json',
                                'url'=>  CController::createUrl('beneficiarios/getMunicipios'),
                                'beforeSend'=>'function() {                            
                                    $("#Beneficiarios_idMunicipio").find("option").remove();                            
                                }',
                                'success'=>"function(data) {
                                    $('#Beneficiarios_idMunicipio').html(data.municipios);                        
                                }",
                            ),
                            'prompt'=>'Seleccione',
                        ),
                    )
                )
            );
        ?>
  

	 <?php              
            echo $form->dropDownListGroup(
                $model, 
                'idMunicipio', 
                array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-4',
                    ), 
                    'widgetOptions' => array(
                        'data' => $arrMunicipios,
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
