<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Requests\ServicesForm;

class ServicesController extends Controller {

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

		$services = Service::all();

		return view('services.index', compact('services'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		$trucks_query = \DB::table('trucks')
		->where('is_available', '=', 0)
		->get();
		$trucks = array();

		foreach ($trucks_query as $truck) {
			$trucks [] = array(
				$truck->id => $truck->brand . ' ' .  $truck->model . ' ' . $truck->plates
			);
		}

		return view('services.create', compact('trucks'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ServicesForm $servicesForm)
	{
		//
		$service = new Service;

		$service->start_of_service = date('Y-m-d', strtotime(\Request::input('start_of_service')));
		$end_of_service = date('Y-m-d', strtotime(\Request::input('end_of_service')));
		$service->end_of_service = $end_of_service;
		$service->type_of_service = \Request::input('type_of_service');
		$service->number_of_delays = \Request::input('number_of_delays');
		//foreign keys

		$truck_id = \Request::input('truck_id');
		$service->truck_id = $truck_id;
		$service->user_id = \Auth::user()->id;
		$service->service_number = uniqid(\Request::input('type_of_service'));

		//change truck's availability flag to not available
		if($end_of_service == '1970-01-01')
		{
			$truck = \DB::table('trucks')
			->where('id', $truck_id)
			->update(['is_in_service' => 1]);
		}
		else
		{
			$truck = \DB::table('trucks')
			->where('id', $truck_id)
			->update(['is_in_service' => 0]);
		}

		$service->save();

		return redirect('services')->with('message', 'Los datos se han agregado correctamente.');

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

		$service = Service::findOrFail($id);

		return view('services.show', compact('service'));
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
		
		$service = Service::findOrFail($id);

		$trucks_query = \DB::table('trucks')
		->where('is_available', '=', 0)
		->get();
		$trucks = array();

		foreach ($trucks_query as $truck) {
			$trucks [] = array(
				$truck->id => $truck->brand . ' ' .  $truck->model . ' ' . $truck->plates
			);
		}

		return view('services.edit', compact('service'), compact('trucks'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ServicesForm $servicesFor)
	{
		//
		$service = Service::findOrFail($id);


		$service->start_of_service = date('Y-m-d', strtotime(\Request::input('start_of_service')));
		$end_of_service = date('Y-m-d', strtotime(\Request::input('end_of_service')));
		$service->end_of_service = $end_of_service;
		$service->type_of_service = \Request::input('type_of_service');
		$service->number_of_delays = \Request::input('number_of_delays');
		//foreign keys

		$truck_id = \Request::input('truck_id');
		$service->truck_id = $truck_id;
		$service->user_id = \Auth::user()->id;
		$service->service_number = uniqid(\Request::input('type_of_service'));

		//change truck's availability flag to not available
		if($end_of_service == '1970-01-01')
		{
			$truck = \DB::table('trucks')
			->where('id', $truck_id)
			->update(['is_in_service' => 1]);
		}
		else
		{
			$truck = \DB::table('trucks')
			->where('id', $truck_id)
			->update(['is_in_service' => 0]);
		}

		$service->save();

		return redirect('services')->with('message', 'Los datos se han actualizado correctamente.');
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
		$service = Service::findOrFail($id);

		$truck_id = $service->truck_id;

		//change truck's availability flag to available
		$truck = \DB::table('trucks')
		->where('id', $truck_id)
		->update(['is_in_service' => 0]);

		$service->delete();

		return redirect('services')->with('message', 'Se han eliminado correctamente los datos.');

	}

}
