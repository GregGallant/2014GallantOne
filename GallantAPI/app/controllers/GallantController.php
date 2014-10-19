<?php

class GallantController extends BaseController {


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
