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

	public function selectOrder()
	{

		$order_numbers = array();
		$orders = \DB::table('orders')
		->get();

		foreach ($orders as $order) {
			$order_numbers [] = array(
				$order->id => $order->order_number
			);
		}

		return view('bills.selectOrder', compact('order_numbers'));
	}

	public function getOrder()
	{
		
		$order_number = \Input::all('order_id');

		$order = \DB::table('orders')
		->where('order_number', '=', $order_number)
		->get();

		return view('bills.getOrder')
			->with('order', $order)
			->with('order_number', $order_number);
	}

	public function index()
	{
		//
		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

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
		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

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
		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

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
		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}
		
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
