<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Bill;
use App\Http\Requests\BillsForm;

class BillsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$bills = Bill::all();

		return view('bills.index', compact('bills'));
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

		return view('bills.create', compact('drivers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(BillsForm $billsForm)
	{
		//
		$bill = new Bill;

		$company_name = \Request::input('company_name');
		$bill->bill_number = uniqid('FAC_' . $company_name);
		$bill->company_name = $company_name;
		$bill->quantity_delivered = \Request::input('quantity_delivered');
		$bill->total_price = \Request::input('total_price');
		$bill->valid_thru = date('Y-m-d', strtotime(\Request::input('valid_thru')));
		//the bill is not paid for until the client pays
		$bill->is_paid_for = 1;
		$bill->driver_id = \Request::input('driver_id');
		$bill->user_id = \Auth::user()->id;

		$bill->save();

		return redirect('bills')->with('message', 'Los datos se han agregado correctamente.');


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
		$bill = Bill::findOrFail($id);

		return view('bills.show', compact('bill'));
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
		$bill = Bill::findOrFail($id);

		$drivers = array();
		$drivers_query = \DB::table('drivers')->get();

		foreach ($drivers_query as $driver) {
			$drivers [] = array(
					$driver->id => $driver->name . ' ' . $driver->last_name 
				);
		}

		return view('bills.edit', compact('bill'), compact('drivers'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, BillsForm $billsForm)
	{
		//
		$bill = Bill::findOrFail($id);

		$company_name = \Request::input('company_name');
		$bill->bill_number = uniqid('FAC_' . $company_name);
		$bill->company_name = $company_name;
		$bill->quantity_delivered = \Request::input('quantity_delivered');
		$bill->total_price = \Request::input('total_price');
		$bill->valid_thru = date('Y-m-d', strtotime(\Request::input('valid_thru')));
		//the bill is not paid for until the client pays
		$bill->is_paid_for = 1;
		$bill->driver_id = \Request::input('driver_id');
		$bill->user_id = \Auth::user()->id;

		$bill->save();

		return redirect('bills')->with('message', 'Los datos se han actualizado correctamente.');
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
		$bill = Bill::findOrFail($id);

		$bill->delete();

		return redirect('bills')->with('message', 'Los datos se han borrado correctamente.');
	}

}
