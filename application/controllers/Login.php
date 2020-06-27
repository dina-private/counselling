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
        $this->loadView('login')->render();
    }
}
