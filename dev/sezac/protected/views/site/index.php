<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1></h1>
<div class="span7">    
    <div align="right">
    <h2><p><?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/sezac.png'); ?> </p></h2>    
    <br>
    <br>
    <?php 
    if (Yii::app()->user->getState("tipo") == "Beneficiario") {        
        $model = Beneficiarios::model()->findByPK(Yii::app()->user->getState("idBeneficiario"));
        $status = "Activo";
        if ($model->isVetado()) {
            $status = "Vetado";
        } 
    ?>
    <h2>
        Estatus:<?php echo " ".$status; ?>
    
    </h2>
    <?php 
    }
    ?>
    </div>
    
</div>



