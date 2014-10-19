<?php

use Portfolio;

class PortfolioController extends BaseController {


    /**
     * index 
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        return View::make('portfolio');
    }

    /**
     * getAllPortfolio
     */
    public function getAllPortfolio()
    {
        $portfolio = Portfolio::all();
        return Response::json($portfolio);
    }

    /*
     * getPortfolio
     */
    public function getPortfolio($id)
    {
        $portfolio = Portfolio::all();
        return Response::json($portfolio);
    }

/*
    public function index()
    {

    \View::addNamespace('angView', '/var/www/GallantOne/public/angPublic/views');

        return \View::make('angView::index');
    }
 */
       

}
