<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Curso',
    'instituicao' => 'Framework Maestro - Curso',
    'import' => array(
        'models.*'
    ),
    'theme' => array(
        'name' => 'default',
        'template' => 'index'
    ),
    'ui' => array(
        'inlineFormAction' => true
    ),
    'login' => array(
        'module' => "",
        'class' => "MAuthDbMd5",
        'check' => false
    ),
    'db' => array(
        'curso' => array(
            'driver' => 'sqlite3',
            'path' => Manager::getAppPath('curso.db'),
            'formatDate' => '%d/%m/%Y',
            'formatTime' => '%H:%M:%S',
            'configurationClass' => 'Doctrine\DBAL\Configuration',
        ),
    ),
);
