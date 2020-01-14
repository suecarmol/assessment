<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'WelcomeController@index');

Route::get('/login' , 'Auth\LoginController@login');

//Route::get('products', 'ProductsController@index');
//Route::get('products/create', 'ProductsController@create');

//New routes

//Products Routes
Route::post('products', 'ProductsController@store');
Route::resource('products', 'ProductsController');

//Trucks Routes
Route::post('trucks', 'TrucksController@store');
Route::resource('trucks', 'TrucksController');

//Users Routes
Route::get('/users/redirect', 'UsersController@redirect');
Route::get('/users/maintenance', 'UsersController@maintenance');
Route::get('/users/billing', 'UsersController@billing');
Route::get('/users/admin', 'UsersController@admin');
Route::get('/users/client_service', 'UsersController@client_service');
Route::get('/users/logistics', 'UsersController@logistics');
Route::get('/users/client', 'UsersController@client');
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
Route::get('bills/selectOrder', 'BillsController@selectOrder');
Route::get('bills/getOrder', 'BillsController@getOrder');
Route::post('bills', 'BillsController@store');
Route::resource('bills', 'BillsController');

//Trucks_Drivers Routes
Route::post('drivers_trucks', 'TrucksDriversController@store');
Route::resource('drivers_trucks', 'TrucksDriversController');

//Routes Routes
Route::post('routes', 'RoutesController@store');
Route::resource('routes', 'RoutesController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
