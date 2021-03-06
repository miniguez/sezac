<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Yii::app()->name; ?></title>
<meta name="language" content="en" />
<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Le styles --> 
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
<!-- Le fav and touch icons -->
</head>

<body>
    <?php
        $this->widget('application.extensions.PNotify.PNotify', array(
            'flash_messages_only' => true,
                )
        );
        $this->widget('ext.widgets.loading.LoadingWidget');
        ?>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#"><?php echo strtoupper(Yii::app()->name); ?></a>
                <div class="nav-collapse">
                    
<?php 
$this->widget(
    'booster.widgets.TbMenu', 
    array(
        'htmlOptions' => array( 'class' => 'nav' ),
        'activeCssClass'=>'active',
        'items'=>array(
            array(
                'label'=>'Inicio', 
                'url'=>array('/site/index')
            ),
            array(
                'label'=>Yii::t('app','_CATALOGOS'),
                'url' => '#',
                'items' => array(
                    array(
                        'label' => Yii::t('app','_DEPENDENCIAS'), 
                        'url' => array('/dependencias/admin'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Encargado"
                    ),
                    array(
                        'label' => Yii::t('app','_UNIDADESRESPONSABLES'), 
                        'url' => array('/unidadesResponsables/admin'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Administrador"
                    ),
                    array(
                        'label' => Yii::t('app','_ANIOSFISCALES'), 
                        'url' => array('/AniosFiscales/admin'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Administrador"
                    ),
                    array(
                        'label' => Yii::t('app','_BENEFICIARIOS'), 
                        'url' => array('/beneficiarios/admin'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Encargado"
                    ),
                    array(
                        'label' => Yii::t('app','_ENCARGADOS'), 
                        'url' => array('/encargados/admin'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Administrador"
                    ),
                    array(
                        'label' => Yii::t('app','_PROGRAMAS'), 
                        'url' => array('/programas/admin'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Encargado"
                    ),
                    array(
                        'label' => Yii::t('app','_USUARIOS'), 
                        'url' => array('/usuarios/admin'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Administrador"
                    ),
                    array(
                        'label' => Yii::t('app','_Organizaciones'), 
                        'url' => array('/organizaciones/admin'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Encargado"
                    ),
                ),
                'visible'=>(!Yii::app()->user->isGuest and (Yii::app()->user->getState("tipo") == "Administrador" || Yii::app()->user->getState("tipo") == "Encargado"))
            ),
            array(
                'label'=>Yii::t('app','_PROGRAMAS'),
                'url' => '#',
                'items' => array(
                    array(
                        'label' => Yii::t('app','_INCRIBIR'), 
                        'url' => array('/programasBeneficiarios/viewProgramas'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Encargado"
                    ),  
                    array(
                        'label' => Yii::t('app','_LISTADOINSCRIPCIONES'), 
                        'url' => array('/programasBeneficiarios/admin'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Encargado"
                    ), 
                    array(
                        'label' => Yii::t('app','_LISTAVETADOS'), 
                        'url' => array('/vetados/admin'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Encargado"
                    ), 
                ),
                'visible'=>Yii::app()->user->getState("tipo") == "Encargado"
            ),
             array(
                'label'=>Yii::t('app','_BENEFICIARIO'),
                'url' => '#',
                'items' => array(
                    array(
                        'label' => Yii::t('app','_MODIFICAR'), 
                        'url' => array('/beneficiarios/formBene'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Beneficiario"
                    ),  
                    array(
                        'label' => Yii::t('app','_LISTADOINSCRIPCIONES'), 
                        'url' => array('/programasBeneficiarios/adminBene'),
                        'visible' =>Yii::app()->user->getState("tipo") == "Beneficiario"
                    ), 
                ),
                'visible'=>(!Yii::app()->user->isGuest and Yii::app()->user->getState("tipo") == "Beneficiario") 
            ),
            array(
                'label'=>Yii::t('app', 'iniciar sesion'), 
                'url'=>array('/site/login'), 
                'visible'=>Yii::app()->user->isGuest
            ),
            /*array(
                'label'=>Yii::t('app', 'Cambiar contraseña'), 
                'url'=>array('/usuarios/changePassword'), 
                'visible'=>!Yii::app()->user->isGuest
            ),*/
            array(
                'label'=>Yii::t('app', 'cerrar sesion').' ('.Yii::app()->user->name.')', 
                'url'=>array('/site/logout'), 
                'visible'=>!Yii::app()->user->isGuest
            ),

            // Ejemplo dropdown
            /*array(
                'label' => 'Dropdown',
                'url' => '#',
                'items' => array(
                    array('label' => 'Action', 'url' => '#'),
                    array('label' => 'Another action', 'url' => '#'),
                    array(
                        'label' => 'Something else here',
                        'url' => '#'
                    ),
                    '---',
                    array('label' => 'Separated link', 'url' => '#'),
                )
            ),*/
        ),
    )
); ?>

                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
	<br>
    <div class="cont">
        <div class="container-fluid">
<?php if (isset($this->breadcrumbs)) {?>
    <?php 
    $this->widget(
        'zii.widgets.CBreadcrumbs', 
        array(
            'links'=>$this->breadcrumbs,
            'homeLink'=>false,
            'tagName'=>'ul',
            'separator'=>'',
            'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
            'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
            'htmlOptions'=>array ('class'=>'breadcrumb')
        )
    ); ?>
    <!-- breadcrumbs -->
<?php 
} 
?>

    <?php 
        echo $content 
    ?>


        </div><!--/.fluid-container-->
    </div>
	
	
	<div class="footer">
	  <div class="container">
		<div class="row">
			<div id="footer-copyright" class="col-md-6">
				
			</div> <!-- /span6 -->
			<div id="footer-terms" class="col-md-6">
				© 2015 
			</div> <!-- /.span6 -->
		 </div> <!-- /row -->
	  </div> <!-- /container -->
	</div>
</body>
</html>

<?php
 echo "";
