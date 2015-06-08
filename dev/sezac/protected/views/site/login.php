
<br>
<h1></h1>

<div class="form">
<?php $form=$this->beginWidget(
    'CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
    'validateOnSubmit'=>true,
    ),
    )
); ?>
<div class="span6">    
     <div align="right">
         <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/Login-Manager.png'); ?>
     </div> 
</div>
<div class="span2">
	<div class="row">						
			<?php 
                        echo $form->textField(
                            $model,
                            'username',
                            array(
                                'placeholder'=>'Usuario(a)',
                                'autocomplete'=>"off"
                            )
                        ); 
                        ?>
			<?php echo $form->error($model, 'username'); ?>
		
	</div>

	<div class="row">				
			<?php echo $form->passwordField($model,'password',array('placeholder'=>'Contraseña')); ?>
			<?php echo $form->error($model, 'password'); ?>		
	</div>
</div>

	
<div class="row buttons">
    <div class="span6"></div>
	<div class="span2">
	    <?php echo CHtml::submitButton(Yii::t('app', 'Login')); ?>
	</div>
</div>	

<?php $this->endWidget(); ?>
</div><!-- form -->
