<?php
    $this->breadcrumbs=array(
            'Beneficiarios'=>array('admin'),
            'Crear',
    );

?>

<?php 
    echo $this->renderPartial(
            '_form', 
            array(
                'model'=>$model,
                'arrBeneficiarios'=>$arrBeneficiarios,
                'arrEstados'=>$arrEstados, 
                'arrMunicipios'=>$arrMunicipios 
            )
    ); 
?>