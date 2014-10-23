<?php

header('Access-Control-Allow-Origin: http://dev.gallantone.com');
//header('Access-Control-Allow-Origin: http://qa.gallantone.com');
//header('Access-Control-Allow-Origin: http://www.gallantone.com');
header('Access-Control-Allow-Methods', 'GET, POST, PUT, OPTIONS'); 




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

/* GallantAPI Time */
Route::get('/', array('uses' => 'GallantController@index'));

Route::get('/portfolio', array('uses' => 'PortfolioController@getAllPortfolio'));

Route::get('/portfolio/{id}', array('uses' => 'PortfolioController@getPortfolio'));

Route::get('/portfolioTotal', array('uses' => 'PortfolioController@getPortfolioTotal'));

