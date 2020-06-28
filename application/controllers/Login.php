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
        $view = $this->loadView('login')->noHeader()->noFooter();

        if (!empty($_POST)) {
            $userDetails = $this->checkUser($_POST['username'], $_POST['password']);
            if (!empty($userDetails)) {
                header('Location: Dashboard');
            } else {
                $view->withError('Invalid login credentials, please try again');
            }
        }
        $view->render();
    }

    /**
     * checkUser description
     *
     * @param $username
     * @param $password
     *
     * @return bool
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    private function checkUser($username, $password)
    {
        /**
         * @var User $userModel
         */
        $userModel = $this->loadModel('User');
        return $userModel->checkUserForLogin($username, $password)[0] ?? false;
    }
}
