<?php

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

header('Access-Control-Allow-Origin: http://qa.gallantone.com');
//header('Access-Control-Allow-Origin: http://www.gallantone.com');
header('Access-Control-Allow-Methods', 'GET, POST, PUT, OPTIONS');


/*
	* |--------------------------------------------------------------------------
	* | Application Routes
	* |--------------------------------------------------------------------------
	* |
	* | Here is where you can register all of the routes for an application.
	* | It's a breeze. Simply tell Laravel the URIs it should respond to
	* | and give it the controller to call when that URI is requested.
	* |
	* */

//$app->get('/', 'WelcomeController@index');
$app->get('home', 'HomeController@index');

/*
$app->controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
]);
*/
/* GallantAPI Time */
$app->get('/', function () use ($app) {
	    return $app->welcome();
});


/* 
 *
 *
 * $app->get('user/{id}/profile', ['as' => 'profile', function ($id) {
 *     //
	 *     }]);
 *
	 *     $url = route('profile', ['id' => 1]);
 */

//$app->get('/', array('uses' => 'GallantController@index'));

//$app->get('/portfolio', array('middleware'=> 'studios', 'uses' => 'PortfolioController@getAllPortfolio'));

$app->get('/portfolio/{id}', ['as' => 'portfolio', 'uses' => 'PortfolioController@getPortfolio' ]);
//	array('uses' => 'PortfolioController@getPortfolio'));

$app->get('/portfolioTotal', array('uses' => 'PortfolioController@getPortfolioTotal'));

// Mail Testing
$app->get('/anewmail', array('uses' => 'MailController@index'));

// Middleware Studio Routing
//$app->get('/studios/admin', array('uses' => 'StudiosController@'));

// Confide routes ( no more using code libs written by douchebags )
$app->get('/users/create', 'UsersController@create');
$app->post('/users', 'UsersController@store');

$app->get('/users/login', 'UsersController@login');
$app->post('/users/login', 'UsersController@doLogin');

$app->get('/users/confirm/{code}', 'UsersController@confirm');

$app->get('/users/forgot_password', 'UsersController@forgotPassword');
$app->post('/users/forgot_password', 'UsersController@doForgotPassword');

