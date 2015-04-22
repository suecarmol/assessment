<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Http\Requests\OrdersForm;

class OrdersController extends Controller {

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

		$orders = Order::all();

		return view('orders.index', compact('orders'));

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

		$products = array();
		$trucks = array();

		$products_query = \DB::table('products')->get();
		$trucks_query = \DB::table('trucks')
		->where('is_available', '=', 0)
		->where('is_in_service', '=', 0)
		->get();


		//creating an associative array to populate the select forms

		foreach ($products_query as $product) {
			$products [] = array(
				$product->id => $product->product_name
			);
		}

		foreach ($trucks_query as $truck) {
			$trucks [] = array(
				$truck->id => $truck->brand . ' ' .  $truck->model . ' ' . $truck->plates
			);
		}

		return view('orders.create', compact('products'), compact('trucks'));
		//return view('orders.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(OrdersForm $ordersForm)
	{
		//

		$order = new Order;

		$order->comapny_name = \Request::input('comapny_name');
		$product_quantity = \Request::input('product_quantity');
		$order->product_quantity = $product_quantity;
		$order->date_of_delivery = date('Y-m-d', strtotime(\Request::input('date_of_delivery')));
		$order->destination = \Request::input('destination');
		$order->order_number = uniqid(\Request::input('comapny_name'));
		//orders and unpaid for by default
		$order->is_paid = 1;

		//foreign keys

		$truck_id = \Request::input('truck_id');
		$product_id = \Request::input('product_id');

		$order->product_id = $product_id;
		$order->truck_id = $truck_id;
		$order->user_id = \Auth::user()->id;

		//change truck's availability flag to not available
		$truck = \DB::table('trucks')
		->where('id', $truck_id)
		->update(['is_available' => 1]);

		//search for the price to calculate total price
		$product_price = \DB::table('products')
		->where('id', $product_id)
		->pluck('price');

		$order->total_price = round($product_price * $product_quantity, 2);

		$order->save();

		return redirect('orders')->with('message', 'Los datos se han agregado correctamente.');


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

		$order = Order::findOrFail($id);

		return view('orders.show', compact('order'));
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

		$order = Order::findOrFail($id);

		$products = array();
		$trucks = array();

		$products_query = \DB::table('products')->get();
		$trucks_query = \DB::table('trucks')
		->where('is_available', '=', 0)
		->where('is_in_service', '=', 0)
		->get();


		//creating an associative array to populate the select forms

		foreach ($products_query as $product) {
			$products [] = array(
				$product->id => $product->product_name
			);
		}

		foreach ($trucks_query as $truck) {
			$trucks [] = array(
				$truck->id => $truck->brand . ' ' .  $truck->model . ' ' . $truck->plates
			);
		}

		return view('orders.edit')->with('order', $order)->with('products', $products)->with('trucks', $trucks);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, OrdersForm $ordersForm)
	{
		//

		$order = Order::findOrFail($id);

		$order->comapny_name = \Request::input('comapny_name');
		$product_quantity = \Request::input('product_quantity');
		$order->product_quantity = $product_quantity;
		$order->date_of_delivery = date('Y-m-d', strtotime(\Request::input('date_of_delivery')));
		$order->destination = \Request::input('destination');
		$order->order_number = uniqid(\Request::input('comapny_name'));
		//orders are unpaid for by default
		$order->order_number = 1;

		//foreign keys

		$truck_id = \Request::input('truck_id');
		$product_id = \Request::input('product_id');
		$order->product_id = $product_id;
		$order->truck_id = $truck_id;
		$order->user_id = \Auth::user()->id;

		//change truck's availability flag to not available
		$truck = \DB::table('trucks')
		->where('id', $truck_id)
		->update(['is_available' => 1]);

		//search for the price to calculate total price
		$product_price = \DB::table('products')
		->where('id', $product_id)
		->pluck('price');

		$order->total_price = $product_price * $product_quantity;

		$order->save();

		return redirect('orders')->with('message', 'Los datos se han actualizado correctamente.');
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
		$input = Order::findOrFail($id);

		$truck_id = $input->truck_id;

		//change truck's availability flag to available
		$truck = \DB::table('trucks')
		->where('id', $truck_id)
		->update(['is_available' => 0]);

		$input->delete();

		return redirect('orders')->with('message', 'Se han eliminado correctamente los datos.');
	}

}
