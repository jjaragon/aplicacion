<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Sistema Integrado de Informacion',
    'language' => 'es',
    'sourceLanguage' => 'es', // Este es el lenguaje por defecto de los archivos 
    'defaultController' => 'sitio',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        /*
         *  'callcenter' => array(
          'defaultController' => 'admin',
          'components' => array(
          'user' => array(
          'class' => 'callcenter.components.UserOperator',
          ),
          )),
         */
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
        // If removed, Gii defaults to localhost only. Edit carefully to taste.
        //  'ipFilters'=>array('127.0.0.1','::1'),
        ),
    ),
//    'session' => array(
//        'class' => 'system.web.CDbHttpSession',
//        'connectionID' => 'db',
//        'sessionTableName' => 'usuario',
//    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'session' => array(
            'class' => 'CDbHttpSession',
            'timeout' => 2592000//1 dia 86400 --> 30 dias,
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => true,
            'rules' => array(
                'site/page/<view:\w+>' => 'site/page/',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
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

        // database settings are configured in database.php
        //'db'=>require(dirname(__FILE__).'/database.php'),
        'db' => array(
            //  'connectionString' => 'pgsql:host=localhost;port=5432;dbname=rrhh',
            'connectionString' => 'mysql:host=localhost;dbname=prueba',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        /* 'errorHandler' => array(
          // use 'site/error' action to display errors
          // 'errorAction' => 'site/error',
          ), */
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
