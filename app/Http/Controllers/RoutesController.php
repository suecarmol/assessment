<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Route;
use App\Http\Requests\RoutesForm;

class RoutesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$routes = Route::all();

		return view('routes.index', compact('routes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$drivers = array();
		$drivers_query = \DB::table('drivers')->get();

		foreach ($drivers_query as $driver) {
			$drivers [] = array(
					$driver->id => $driver->name . ' ' . $driver->last_name 
				);
		}

		return view('routes.create', compact('drivers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(RoutesForm $routesForm)
	{
		//
		$route = new Route;

		$route->origin = \Request::input('origin');
		$route->destination = \Request::input('destination');
		$route->date_of_departure = date('Y-m-d', strtotime(\Request::input('date_of_departure')));
		$route->driver_id = \Request::input('driver_id');
		$route->user_id = \Auth::user()->id;
		$route->route_number = uniqid('RT'. \Request::input('destination'));

		$route->save();

		return redirect('routes')->with('message', 'Los datos se han agregado correctamente.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$route = Route::findOrFail($id);

		return view('routes.show')->with('route', $route);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$route = Route::findOrFail($id);

		$drivers = array();
		$drivers_query = \DB::table('drivers')->get();

		foreach ($drivers_query as $driver) {
			$drivers [] = array(
					$driver->id => $driver->name . ' ' . $driver->last_name 
				);
		}

		return view('routes.edit')->with('route', $route)->with('drivers', $drivers);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, RoutesForm $routesForm)
	{
		//
		$route = Route::findOrFail($id);

		$route->origin = \Request::input('origin');
		$route->destination = \Request::input('destination');
		$route->date_of_departure = date('Y-m-d', strtotime(\Request::input('date_of_departure')));
		$route->driver_id = \Request::input('driver_id');
		$route->user_id = \Auth::user()->id;
		$route->route_number = uniqid('RT'. \Request::input('destination'));

		$route->save();

		return redirect('routes')->with('message', 'Los datos se han actualizado correctamente.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$route = Route::findOrFail($id);

		$route->delete();

		return redirect('routes')->with('message', 'Los datos se han borrado correctamente.');

	}

}
