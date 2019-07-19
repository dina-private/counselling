<?php
//Start the Session
session_start();

// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('APP_DIR', ROOT_DIR . 'application' . DIRECTORY_SEPARATOR);
define('CORE_FOLDER', 'core');

// Includes
require ROOT_DIR . CORE_FOLDER . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
require ROOT_DIR . CORE_FOLDER . DIRECTORY_SEPARATOR . 'Model.php';
require ROOT_DIR . CORE_FOLDER . DIRECTORY_SEPARATOR . 'View.php';
require ROOT_DIR . CORE_FOLDER . DIRECTORY_SEPARATOR . 'Controller.php';
require ROOT_DIR . CORE_FOLDER . DIRECTORY_SEPARATOR . 'App.php';

(new App())->start();
