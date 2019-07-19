<?php

/**
 * Class Core
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class App
{
    public function __construct()
    {
    }

    /**
     * runApp description
     *
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function start()
    {
        // Set our defaults
        $controller = DEFAULT_CONTROLLER;
        $action = DEFAULT_ACTION;
        $url = '';

        // Get request url and script url
        $requestURL = $_SERVER['REQUEST_URI'] ?? '';
        $scriptURL = $_SERVER['PHP_SELF'] ?? '';

        // Get our url path and trim the / of the left and the right
        if ($requestURL != $scriptURL) {
            $url = trim(preg_replace('/' . str_replace('/', '\/', str_replace('index.php', '', $scriptURL)) . '/', '', $requestURL, 1), '/');
        }

        // Split the url into segments
        $segments = explode('/', $url);

        // Do our default checks
        if (isset($segments[0]) && $segments[0] != '') {
            $controller = $segments[0];
        }

        if (isset($segments[1]) && $segments[1] != '') {
            $action = $segments[1];
        }

        // Get our controller file
        $controllerPath = APP_DIR . CONTROLLER_FOLDER . DIRECTORY_SEPARATOR . $controller . '.php';
        if (!file_exists($controllerPath)) {
            $controller = ERROR_CONTROLLER;
            $controllerPath = APP_DIR . CONTROLLER_FOLDER . DIRECTORY_SEPARATOR . $controller . '.php';
        }
        require_once $controllerPath;

        // Check the action exists
        if (!method_exists($controller, $action)) {
            $controller = ERROR_CONTROLLER;
            require_once APP_DIR . CONTROLLER_FOLDER . DIRECTORY_SEPARATOR . $controller . '.php';
            $action = 'index';
        }

        // Create object and call method
        $obj = new $controller;
        die(call_user_func_array([$obj, $action], array_slice($segments, 2)));
    }

}