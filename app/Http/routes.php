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

//Products Routes
Route::post('products', 'ProductsController@store');
Route::resource('products', 'ProductsController');

//Trucks Routes
Route::post('trucks', 'TrucksController@store');
Route::resource('trucks', 'TrucksController');

//Users Routes
Route::post('users', 'UsersController@store');
Route::resource('users', 'UsersController');

//Orders Routes
Route::post('orders', 'OrdersController@store');
Route::resource('orders', 'OrdersController');

//Tires Routes
Route::post('tires', 'TiresController@store');
Route::resource('tires', 'TiresController');

//Services Routes
Route::post('services', 'ServicesController@store');
Route::resource('services', 'ServicesController');

//Drivers Routes
Route::post('drivers', 'DriversController@store');
Route::resource('drivers', 'DriversController');

//Bills Routes 
Route::post('bills', 'BillsController@store');
Route::resource('bills', 'BillsController');






