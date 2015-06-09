<div class="form">
<?php $form=$this->beginWidget(
    'booster.widgets.TbActiveForm', array(
        'id'=>'dependencias-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well','enctype'=>'multipart/form-data'),
    )
); ?>

<p class="help-block"><?php echo Yii::t('app', 'Fields with') ?>
<span class="required">*</span><?php echo Yii::t('app', 'are required.') ?></p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldGroup($model,'nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

<?php              
    echo $form->dropDownListGroup(
        $model, 
        'idDependencia', 
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-4',
            ), 
            'widgetOptions' => array(
                'data' => $arrDependencias,
                'options' => array(                     
                    'allowClear' => true,                     
                ),
                'htmlOptions' => array(                    
                    'ajax'=>array(
                        'type'=>'POST',
                        'dataType'=>'json',
                        'url'=>  CController::createUrl('programas/getUnidades'),
                        'beforeSend'=>'function() {                            
                            $("#Programas_idUnidadesResponsable").find("option").remove();                            
                        }',
                        'success'=>"function(data) {
                            $('#Programas_idUnidadesResponsable').html(data.unidades);                        
                        }",
                    ),
                    'prompt' => 'Seleccione',
                ),
            )
        )
    );
?>
<?php              
    echo $form->dropDownListGroup(
        $model, 
        'idUnidadesResponsable', 
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-4',
            ), 
            'widgetOptions' => array(
                'data' => $arrUnidades,
                'options' => array(
                    'placeholder' => 'Seleccione', 
                    'allowClear' => false,                     
                )                
            )
        )
    );
?>

<?php              
    echo $form->dropDownListGroup(
        $model, 
        'idAniosFiscale', 
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-4',
            ), 
            'widgetOptions' => array(
                'data' => $arrAnios,
                'options' => array(
                    'placeholder' => 'Seleccione', 
                    'allowClear' => false,                     
                )                
            )
        )
    );
?>

<div class="form-group">
<label class="col-sm-3 control-label" for="Programas_archivo"><?php echo Yii::t('app','_REQUISITOS')?></label>
<div class="col-sm-9">
    
<?php
    if (!$model->isNewRecord && $model->archivo) {
?>
<div class="MultiFile-label">
<span class="MultiFile-title" title="File selected: <?php echo $model->archivo ?>"><?php echo $model->archivo ?></span>
</div>
<?php
    }
?> 
<?php 
$this->widget(
    'CMultiFileUpload', 
    array(
        'name'=>'pictures',
        'value'=>Yii::t('app', 'Review'),          
        'accept'=>'pdf',
        'denied'=>Yii::t('app', '_TIPO_ARCHIVO_INVALIDO'),
        'max'=>1,
        'htmlOptions'=>array('class'=>'uploadfiles'),
    )
);
?>
    <br>
</div>
</div>


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