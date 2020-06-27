<?php

include_once 'helper.functions.php';

// Includes
includeFiles([
    CORE_DIR . 'Model.php', // @todo we are loading even application is not using model

    CORE_DIR . 'interface' . DIRECTORY_SEPARATOR . 'IView.php',
    CORE_DIR . 'View.php',

    CORE_DIR . 'Controller.php',
    CORE_DIR . 'DBConnection.php',
    CORE_DIR . 'App.php'
]);

// Pre-loaders
$_config = getJSON(CORE_DIR . 'config' . DIRECTORY_SEPARATOR . 'config.json');

if (!empty($_config['constants'])) {
    foreach ($_config['constants'] as $key => $value) {
        define($key, $value);
    }
}
