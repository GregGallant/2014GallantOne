<?php

namespace App\Http\Controllers;

use \Response;
use App\Models\Portfolio;

class PortfolioController extends BaseController {


    /**
     * index 
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        //return View::make('portfolio');
        return view('portfolio', []);
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
     * getPortfolio via JSON position
     */
    public function getPortfolio($pos)
    {
        $portfolio = json_decode(Portfolio::all(), true);
        error_log('Getting Portfolio: '.print_r($portfolio, true));
        foreach ($portfolio as $port) {
            //return Response::json($portfolio[$pos]);
            return response()->json($portfolio[$pos]);
        }
    }

    /*
     * getPortfolio via portfolio id
     */
    public function getPortfolioById($id)
    {
        $portfolio = Portfolio::find($id);
        return response()->json($portfolio);
       // return Response::json($portfolio);
    }

    /** 
      * When adding your services directory... consult this before moving queries...
      * http://stackoverflow.com/questions/20627727/where-do-i-put-custom-code-in-laravel    
     **/
    public function getPortfolioTotal() 
    {
        $portfolio = Portfolio::all();
        return response()->json(count($portfolio));
        //return Response::json(count($portfolio));
    }


}
