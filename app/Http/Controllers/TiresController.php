<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tire;

class TiresController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$tires = Tire::all();

		return view('tires.index', compact('tires'));
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

		$trucks_query = \DB::table('trucks')->get();

		foreach ($trucks_query as $truck) {
			$trucks [] = array(
				$truck->id => $truck->brand . ' ' .  $truck->model . ' ' . $truck->plates
 			);
		}

		return view('tires.create', compact('trucks'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//

		$tire = new Tire;

		$tire->brand = \Request::input('brand');
		$tire->serial_number = \Request::input('serial_number');
		$tire->date_added_to_truck = date('Y-m-d', strtotime(\Request::input('date_added_to_truck')));
		$tire->date_last_service = date('Y-m-d', strtotime(\Request::input('date_last_service')));
		$tire->date_removed = date('Y-m-d', strtotime(\Request::input('date_removed')));
		$tire->truck_id = \Request::input('truck_id');

		$tire->save();

		return redirect('tires')->with('messages', 'Los datos se han agregado correctamente.');

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
		$tire = Tire::findOrFail($id);

		return view('tires.show', compact('tire'));
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

		$tire = Tire::findOrFail($id);

		$trucks = array();

		$trucks_query = \DB::table('trucks')->get();

		foreach ($trucks_query as $truck) {
			$trucks [] = array(
				$truck->id => $truck->brand . ' ' .  $truck->model . ' ' . $truck->plates
 			);
		}

		return view('tires.edit', compact('tire'), compact('trucks'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$tire = Tire::findOrFail($id);
		$tire->brand = \Request::input('brand');
		$tire->serial_number = \Request::input('serial_number');
		$tire->date_added_to_truck = \Request::input('date_added_to_truck');
		$tire->date_last_service = \Request::input('date_last_service');
		$tire->date_removed = \Request::input('date_removed');
		$tire->truck_id = \Request::input('truck_id');

		$tire->save();

		return redirect('tires')->with('messages', 'Los datos se han actualizado correctamente.');

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
		$tire = Tire::findOrFail($id);

		$tire->delete();

		return redirect('tires')->with('message', 'Se han eliminado correctamente los datos.');
	}

}
