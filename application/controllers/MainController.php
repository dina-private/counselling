<?php

/**
 * Class MainController
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class MainController extends Controller
{
    /**
     * index description
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function index()
    {
        $this->loadView('index')
            ->noHeader()->noFooter()
            ->setPageData(['firstName' => 'Dinanath', 'lastName' => 'Thakur'])
            ->render();
    }
}
