<?php

/**
 * Class View
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class View
{
    /**
     * @var array
     */
    private $pageVars = [];
    /**
     * @var string
     */
    private $template;

    /**
     * View constructor.
     *
     * @param $template
     */
    public function __construct($template)
    {
        $this->template = APP_DIR . VIEW_FOLDER . DIRECTORY_SEPARATOR . $template . '.php';
    }

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
        $this->pageVars[$key] = $val;
    }

    /**
     * sets description
     *
     * @param $array
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function sets($array)
    {
        foreach ($array as $key => $val) {
            $this->pageVars[$key] = $val;
        }
    }

    /**
     * render description
     *
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function render()
    {
        extract($this->pageVars);

        ob_start();
        require $this->template;
        echo ob_get_clean();
    }
}
