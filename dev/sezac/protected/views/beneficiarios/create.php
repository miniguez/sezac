<?php
    $this->breadcrumbs=array(
            'Beneficiarios'=>array('admin'),
            'Crear',
    );

?>

<h1>Crear Beneficiario</h1>


<?php 
    echo $this->renderPartial(
            '_form', 
            array(
                'model'=>$model,
                'arrBeneficiarios'=>$arrBeneficiarios
            )
    ); 
?>