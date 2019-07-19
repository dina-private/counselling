<?php

$configFile = __DIR__ . DIRECTORY_SEPARATOR . 'config.json';
$configData = json_decode(file_get_contents($configFile), true);


if ($constants = $configData['constants'] ?? false) {
    foreach ($constants as $key => $value) {
        if (!defined($key)) {
            define($key, $value);
        }
    }
}
