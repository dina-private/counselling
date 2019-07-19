<?php

/**
 * Class ErrorController
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class ErrorController extends Controller
{

    /**
     * index description
     *
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function index()
    {
        $this->error404();
    }

    /**
     * error404 description
     *
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function error404()
    {
        echo '<h1>404 Error</h1>';
        echo '<p>Looks like this page doesn\'t exist</p>';
    }

}
