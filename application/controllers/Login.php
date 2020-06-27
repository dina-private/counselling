<?php

/**
 * Class Login
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class Login extends Controller
{
    /**
     * index description
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function index()
    {

        if (!empty($_POST)) {
            
        } else {
            $this->loadView('login')->render();
        }
    }
}
