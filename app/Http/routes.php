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

Route::get('/', 'WelcomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Route::get('products', 'ProductsController@index');
//Route::get('products/create', 'ProductsController@create');

//New routes

//NOTE TO SELF: to add new routes not in resource (CRUD), you should add them BEFORE 
//your Route::resource call

Route::post('products', 'ProductsController@store');
Route::resource('products', 'ProductsController');
Route::resource('trucks', 'TrucksController');