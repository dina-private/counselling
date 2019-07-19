<?php

/**
 * Class Login
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class Login extends Controller
{
    /**
     * Login constructor.
     *
     * @param App $app
     */
    public function __construct(App $app)
    {
        parent::__construct($app);
    }

    /**
     * index description
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function index()
    {
        $template = $this->loadView('login');
        $template->render();
    }
}
