<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

defined('FONTS_PATH')
//    || define('FONTS_PATH', 'C:/Windows/Fonts/');
    || define('FONTS_PATH', APPLICATION_PATH . '/../public/fonts/');

defined('IMAGE_URL')
    || define('IMAGE_URL', "http://127.0.0.1/hades/images/");

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php'; 

require_once 'Zend/Loader/Autoloader.php';

$loader = Zend_Loader_Autoloader::getInstance();

$loader->registerNamespace('App_');;

Zend_Session::start();

$config = new Zend_Config_Ini('/../application/configs/db_config.ini', 'offline');
$registry = Zend_Registry::getInstance();
$registry->set('db_config',$config);
$db_config = Zend_Registry::get('db_config');
$db = Zend_Db::factory($db_config->db);
Zend_Db_Table::setDefaultAdapter($db);
$db->query("SET NAMES 'utf8'");


// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();