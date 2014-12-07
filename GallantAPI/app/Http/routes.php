<?php

//header('Access-Control-Allow-Origin: http://dev.gallantone.com');
header('Access-Control-Allow-Origin: http://qa.gallantone.com');
//header('Access-Control-Allow-Origin: http://www.gallantone.com');
header('Access-Control-Allow-Methods', 'GET, POST, PUT, OPTIONS'); 


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/* GallantAPI Time */
Route::get('/', array('uses' => 'GallantController@index'));

Route::get('/portfolio', array('uses' => 'PortfolioController@getAllPortfolio'));

Route::get('/portfolio/{id}', array('uses' => 'PortfolioController@getPortfolio'));

Route::get('/portfolioTotal', array('uses' => 'PortfolioController@getPortfolioTotal'));

// Mail Testing
Route::get('/anewmail', array('uses' => 'MailController@index'));


// Confide routes
Route::get('/users/create', 'UsersController@create');
Route::post('/users', 'UsersController@store');

Route::get('/users/login', 'UsersController@login');
Route::post('/users/login', 'UsersController@doLogin');

Route::get('/users/confirm/{code}', 'UsersController@confirm');

Route::get('/users/forgot_password', 'UsersController@forgotPassword');
Route::post('/users/forgot_password', 'UsersController@doForgotPassword');

