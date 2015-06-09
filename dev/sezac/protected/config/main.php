<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'SEZAC',
    'language'=>'es',
    'theme'=>'blackboot', 
    

    // preloading 'log' component
        'preload'=>array('log',
                                 php_sapi_name() !== 'cli'
                                 ?   'bootstrap'
                                 : '',
                ),

    
    
    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*'		
    ),

    
    'modules'=>array(		
        'gii' => array(
            'class'=>'system.gii.GiiModule',
            'password'=>'1234',
            'generatorPaths' => array(				
                'booster.gii'			
                ),
            ),    
    ), 

    // application components
    'components'=>array(
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),		
        'bootstrap'=>array( 
            'class'=>'ext.bootstrap.components.Booster'
            ),
        // uncomment the following to enable URLs in path-format
        /*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
        
        // uncomment the following to use a MySQL database
        
        'db'=>array(            
            'connectionString' => 'mysql:host=localhost;dbname=sezac',
            'emulatePrepare' => true,               
            'username' => 'root',                       
            'password' => 'root',
            'charset' => 'utf8',
        ),
        
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'webmaster@example.com',
    ),
);
