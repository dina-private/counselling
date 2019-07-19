<?php

/**
 * Class SessionHelper
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class SessionHelper
{
    /**
     * set description
     *
     * @param $key
     * @param $val
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    /**
     * get description
     *
     * @param $key
     *
     * @return mixed
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function get($key)
    {
        return $_SESSION[$key];
    }

    /**
     * destroy description
     *
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function destroy()
    {
        session_destroy();
    }
}
