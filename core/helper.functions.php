<?php

function includeFiles($files)
{
    foreach ($files as $filePath) {
        includeFile($filePath);
    }
}

function includeFile($filePath)
{
    if (file_exists($filePath)) {
        include_once $filePath;
    } else {
        die('File path not found: ' . $filePath);
    }
}

function getJSON($filePath)
{
    return json_decode(file_get_contents($filePath), true);
}

function getConfig($key, $defaultValue = null)
{
    global $_config;
    return $_config[$key] ?? $defaultValue;
}
