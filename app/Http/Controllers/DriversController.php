<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Driver;
use App\Http\Requests\DriversForm;

class DriversController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$drivers = Driver::all();

		return view('drivers.index', compact('drivers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//	

		return view('drivers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(DriversForm $driversForm)
	{
		//
		$driver = new Driver;

		$driver->name = \Request::input('name');
		$driver->last_name = \Request::input('last_name');
		$driver->number_of_tickets = \Request::input('number_of_tickets');

		//everytime a driver is created, they are added as available (0)
		$driver->is_available = 0;

		$driver->save();

		return redirect('drivers')->with('message', 'Los datos se han agregado correctamente.');

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
		$driver = Driver::findOrFail($id);

		return view('drivers.show', compact('driver'));
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
		$driver = Driver::findOrFail($id);

		return view('drivers.edit', compact('driver'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, DriversForm $driversForm)
	{
		//
		$driver = Driver::findOrFail($id);

		$driver->name = \Request::input('name');
		$driver->last_name = \Request::input('last_name');
		$driver->number_of_tickets = \Request::input('number_of_tickets');

		//everytime a driver is created, they are added as available (0)
		$driver->is_available = 0;

		$driver->save();

		return redirect('drivers')->with('message', 'Los datos se han actualizado correctamente.');

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
		$driver = Driver::findOrFail($id);

		$driver->delete();

		return redirect('drivers')->with('message', 'Se han eliminado correctamente los datos.');

	}

}
