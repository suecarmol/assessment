<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Truck_Driver;
use App\Http\Requests\TrucksDriversForm;

class TrucksDriversController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$truck_driver = Truck_Driver::all();

		return view('drivers_trucks.index', compact('truck_driver'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$trucks = array();
		$drivers = array();

		$trucks_query = \DB::table('trucks')->where('is_available', 1)->get();
		$drivers_query = \DB::table('drivers')->where('is_available', 0)->get();

		foreach ($trucks_query as $truck) {
			$trucks [] = array(
				$truck->id => $truck->brand . ' ' . $truck->model . ' ' . $truck->plates
			);
		}

		foreach ($drivers_query as $driver) {
			$drivers [] = array(
				$driver->id => $driver->name . ' ' . $driver->last_name
			);
		}

		return view('drivers_trucks.create')->with('trucks', $trucks)->with('drivers', $drivers);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TrucksDriversForm $trucksDriversForm)
	{
		//
		$truck_driver = new Truck_Driver;

		$driver_id = \Request::input('driver_id');
		$truck_driver->truck_id = \Request::input('truck_id');
		$truck_driver->driver_id = $driver_id;
		$truck_driver->date_assigned = date('Y-m-d', strtotime(\Request::input('date_assigned')));

		//update driver to not available
		$driver = \DB::table('drivers')
		->where('id', $driver_id)
		->update(['is_available' => 1]);

		$truck_driver->save();

		return redirect('drivers_trucks')->with('message', 'Se han agregado los datos correctamente.');
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
		$driver_truck = Truck_Driver::findOrFail($id);

		return view('drivers_trucks.show', compact('driver_truck'));
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
		$truck_driver = Truck_Driver::findOrFail($id);

		$trucks = array();
		$drivers = array();

		$trucks_query = \DB::table('trucks')->get();
		$drivers_query = \DB::table('drivers')->get();

		foreach ($trucks_query as $truck) {
			$trucks [] = array(
				$truck->id => $truck->brand . ' ' . $truck->model . ' ' . $truck->plates
			);
		}

		foreach ($drivers_query as $driver) {
			$drivers [] = array(
				$driver->id => $driver->name . ' ' . $driver->last_name
			);
		}

		return view('drivers_trucks.edit')->with('truck_driver', $truck_driver)->with('trucks', $trucks)->with('drivers', $drivers);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, TrucksDriversForm $trucksDriversForm)
	{
		//

		$truck_driver = Truck_Driver::findOrFail($id);

		$driver_id = \Request::input('driver_id');
		$truck_driver->truck_id = \Request::input('truck_id');
		$truck_driver->driver_id = $driver_id;
		$truck_driver->date_assigned = date('Y-m-d', strtotime(\Request::input('date_assigned')));

		//update driver to not available
		$driver = \DB::table('drivers')
		->where('id', $driver_id)
		->update(['is_available' => 1]);

		$truck_driver->save();

		return redirect('drivers_trucks')->with('message', 'Se han agregado los datos correctamente.');
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
		$driver_truck = Truck_Driver::findOrFail($id);

		$driver_id = $driver_truck->driver_id;

		$driver = \DB::table('drivers')
		->where('id', $driver_id)
		->update(['is_available' => 0]);

		$driver_truck->delete();

		return redirect('drivers_trucks')->with('message', 'Se han borrado los datos correctamente.');

	}

}
