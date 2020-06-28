<?php

/**
 * Class Dashboard
 *
 * @author Dinanath Thakur <kumardina023@gmail.com>
 */
class Dashboard extends Controller
{
    /**
     * index description
     *
     * @author Dinanath Thakur <kumardina023@gmail.com>
     */
    public function index()
    {
        $this->loadView('dashboard')
            ->setPageData(['firstName' => 'Dinanath', 'lastName' => 'Thakur'])
            ->render();
    }
}
