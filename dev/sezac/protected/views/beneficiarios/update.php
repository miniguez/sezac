<?php
    $this->breadcrumbs=array(
            'Beneficiarios'=>array('admin'),
            'Actualizar '.$model->nombre.$model->apellidoPaterno
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