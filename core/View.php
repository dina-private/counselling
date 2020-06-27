<?php


class View implements IView
{
    private $viewName = null;
    private $viewPath = null;
    private $pageData = [];


    public function __construct($viewName)
    {
        $this->viewName = $viewName;
        $this->viewPath = realpath(VIEW_FOLDER . DIRECTORY_SEPARATOR . $this->viewName . '.php');
    }

    public function render()
    {
        extract($this->getPageData());
        include_once $this->viewPath;
    }

    public function setPageData($pageData)
    {
        $this->pageData = $pageData;
        return $this;
    }

    private function getPageData()
    {
        return $this->pageData;
    }
}
