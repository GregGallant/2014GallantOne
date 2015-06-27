<?php namespace App\Http\Controllers;

use View;

class GallantController extends BaseController {

	public function __construct()
	{
		//$this->middleware('guest');
	}

    /**
     * index 
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        return View::make('hello');
    }

/*
    public function index()
    {

    \View::addNamespace('angView', '/var/www/GallantOne/public/angPublic/views');

        return \View::make('angView::index');
    }
 */
       

}
