<?php
$this->breadcrumbs=array(
            'Usuarios'=>array('admin'),
            'Crear',
            
    );
?>

<?php
    echo $this->renderPartial(
            '_form', 
            array(
                'model'=>$model,
                'arrBeneficiarios'=>$arrBeneficiarios,
                
            )
    ); ?>