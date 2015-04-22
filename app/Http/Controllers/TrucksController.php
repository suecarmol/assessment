<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Truck;
use Illuminate\Http\Request;
use App\Http\Requests\TrucksForm;

class TrucksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		$trucks = Truck::all();

		return view('trucks.index', compact('trucks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('trucks.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TrucksForm $truckForm)
	{
		//
		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		$input = new Truck;

		$input->model = \Request::input('model');
		$input->brand = \Request::input('brand');
		$input->year = \Request::input('year');
		$input->plates = \Request::input('plates');
		$input->capacity = \Request::input('capacity');
		$input->date_last_service = date('Y-m-d', strtotime(\Request::input('date_last_service')));

		//when creating a truck, both fields are 0 by default
		$input->is_available = 0;
		$input->is_in_service = 0;

		$input->save();

		return redirect('trucks')->with('message', 'Se han agregado correctamente los datos.');
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
		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		$truck = Truck::findOrFail($id);

		return view('trucks.show', compact('truck'));
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
		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}
		
		$truck = Truck::findOrFail($id);

		return view('trucks.edit', compact('truck'));
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

		$input = Truck::findOrFail($id);

		$input->model = \Request::input('model');
		$input->brand = \Request::input('brand');
		$input->year = \Request::input('year');
		$input->plates = \Request::input('plates');
		$input->capacity = \Request::input('capacity');
		$input->date_last_service = date('Y-m-d', strtotime(\Request::input('date_last_service')));

		//when creating a truck, both fields are 0 by default
		$input->is_available = 0;
		$input->is_in_service = 0;

		$input->save();

		return redirect('trucks')->with('message', 'Se han actualizado correctamente los datos.');
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
		$input = Truck::findOrFail($id);

		$input->delete();

		return redirect('trucks')->with('message', 'Se han eliminado correctamente los datos.');
	}

}
