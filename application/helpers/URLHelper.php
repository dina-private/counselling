<?php

/**
 * Class URLHelper
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class URLHelper
{
    /**
     * getBaseURL description
     *
     * @return mixed
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function getBaseURL()
    {
        return BASE_URL;
    }

    /**
     * segment description
     *
     * @param $seg
     *
     * @return bool
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function segment($seg)
    {
        if (!is_int($seg)) {
            return false;
        }

        $parts = explode('/', $_SERVER['REQUEST_URI']);
        return $parts[$seg] ?? false;
    }
}
