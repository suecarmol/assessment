<?php namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UsersForm;

class UsersController extends Controller {


	public function maintenance(){

		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		//check if user is allowed in this view
		if(\Auth::user()->user_type != 'maintenance')
		{
			return redirect('users/'. \Auth::user()->user_type);
		}

		//get count from all trucks for percentages
		$trucks_count = \DB::table('trucks')
		->count();

		//getting basic stats for maintenance page
		$trucks_in_service = \DB::table('trucks')
		->where('is_in_service', '=', 1)
		->count();

		$available_trucks = \DB::table('trucks')
		->where('is_available', '=', 0)
		->where('is_in_service', '=', 0)
		->count();

		$trucks_with_delays = \DB::table('services')
		->where('number_of_delays', '>', 0)
		->count();

		$trucks_in_route = \DB::table('trucks')
		->where('is_available', '=', 1)
		->where('is_in_service', '=', 0)
		->count();

		//percentages
		if($trucks_count > 0)
		{
			$trucks_in_service_percentage = round(($trucks_in_service * 100)/$trucks_count, 2);
			$available_trucks_percentage = round(($available_trucks * 100)/$trucks_count, 2);
			$trucks_with_delays_percentage = round(($trucks_with_delays * 100)/$trucks_count, 2);
			$trucks_in_route_percentage = round(($trucks_in_route * 100)/$trucks_count, 2);
		}
		else
		{
			$trucks_in_service_percentage = 0.0;
			$available_trucks_percentage = 0.0;
			$trucks_with_delays_percentage = 0.0;
			$trucks_in_route_percentage = 0.0;
		}

		$tires_count = \DB::table('tires')
		->count();

		$tires_in_use= \DB::table('tires')
		->where('is_removed', '=', 1)
		->count();

		$removed_tires = \DB::table('tires')
		->where('is_removed', '=', 0)
		->count();

		if($tires_count > 0){
			$tires_in_use_percentage = round(($tires_in_use * 100)/$tires_count, 2);
			$removed_tires_percentage = round(($removed_tires * 100)/$tires_count, 2);
		}
		else
		{
			$tires_in_use_percentage = 0.0;
			$removed_tires_percentage = 0.0;
		}

		//returning view
		return view('users.maintenance')
		->with('trucks_in_service', $trucks_in_service)
		->with('available_trucks', $available_trucks)
		->with('trucks_with_delays', $trucks_with_delays)
		->with('trucks_in_route', $trucks_in_route)
		->with('trucks_in_service_percentage', $trucks_in_service_percentage)
		->with('available_trucks_percentage', $available_trucks_percentage)
		->with('trucks_with_delays_percentage', $trucks_with_delays_percentage)
		->with('trucks_in_route_percentage', $trucks_in_route_percentage)
		->with('tires_in_use_percentage', $tires_in_use_percentage)
		->with('removed_tires_percentage', $removed_tires_percentage);
	}

	public function billing(){

		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		//check if user is allowed in this view
		if(\Auth::user()->user_type != 'billing')
		{
			return redirect('users/'. \Auth::user()->user_type);
		}

		//get count from all bills for percentages
		$bills_count = \DB::table('bills')
		->count();

		$paid_bills = \DB::table('bills')
		->where('is_paid_for', '=', 0)
		->count();

		$unpaid_bills = \DB::table('bills')
		->where('is_paid_for', '=', 1)
		->count();
	
		if($bills_count > 0)
		{
			$paid_bills_percentage = round(($paid_bills * 100)/$bills_count, 2);
			$unpaid_bills_percentage = round(($unpaid_bills * 100)/$bills_count, 2);
		}
		else{
			$paid_bills_percentage = 0.0;
			$unpaid_bills_percentage = 0.0;
		}

		$average_price = round(\DB::table('bills')
		->avg('total_price'), 2);

		$biggest_contributor = round(\DB::table('bills')
		->max('total_price'), 2);

		return view('users.billing')
		->with('paid_bills', $paid_bills)
		->with('unpaid_bills', $unpaid_bills)
		->with('paid_bills_percentage', $paid_bills_percentage)
		->with('unpaid_bills_percentage', $unpaid_bills_percentage)
		->with('average_price', $average_price)
		->with('biggest_contributor', $biggest_contributor);
	}

	public function client_service(){

		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		//check if user is allowed in this view
		if(\Auth::user()->user_type != 'client_service')
		{
			return redirect('users/'. \Auth::user()->user_type);
		}

		$average_prices_per_order = round(\DB::table('orders')
		->avg('total_price'), 2);

		$average_quantity_per_order = round(\DB::table('orders')
		->avg('product_quantity'), 2);

		$top_5_customers = \DB::table('orders')
		->select('comapny_name', \DB::raw('sum(total_price) as revenue'))
		->groupBy('comapny_name')
		->orderBy('revenue', 'desc')
		->take(5)
		->get();

		$top_5 = array();
		
		$total_revenue = \DB::table('orders')
		->select(\DB::raw('sum(total_price) as total_revenue'))
		->pluck('total_revenue');

		if($total_revenue > 0)
		{		
			foreach ($top_5_customers as $customer) {
				$top_5 [] = array(
					'comapny_name' => $customer->comapny_name,
					'percentage' => round(($customer->revenue*100)/$total_revenue, 2)
				);
			}
		}
		else{
			$top_5 [] = array(
					'comapny_name' => 0.0,
					'percentage' => 0.0
				);
		}	

		$best_client = \DB::table('orders')
		->select(\DB::raw('comapny_name, sum(total_price) as revenue'))
		->groupBy('comapny_name')
		->orderBy('revenue', 'desc')
		->pluck('revenue');

		$more_orders = \DB::table('orders')
		->select(\DB::raw('comapny_name, count(order_number) as order_count'))
		->groupBy('comapny_name')
		->orderBy('order_count', 'desc')
		->pluck('order_count');

		return view('users.client_service')
		->with('average_prices_per_order', $average_prices_per_order)
		->with('average_quantity_per_order', $average_quantity_per_order)
		->with('top_5', $top_5)
		->with('best_client', $best_client)
		->with('more_orders', $more_orders);
	}

	public function client(){

		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		//check if user is allowed in this view
		if(\Auth::user()->user_type != 'client')
		{
			return redirect('users/'. \Auth::user()->user_type);
		}

		$user_company = \Auth::user()->company;
		$user_id = \Auth::user()->id;

		$total_company_orders = \DB::table('orders')
		->where('comapny_name', '=', $user_company)
		->count();

		$total_user_orders = \DB::table('orders')
		->where('user_id', '=', $user_id)
		->count();

		$unpaid_orders = \DB::table('orders')
		->where('user_id', '=', $user_id)
		->where('is_paid', '=', 1)
		->count();

		$paid_orders = \DB::table('orders')
		->where('user_id', '=', $user_id)
		->where('is_paid', '=', 0)
		->count();

		return view('users.client')
		->with('total_company_orders', $total_company_orders)
		->with('total_user_orders',$total_user_orders)
		->with('unpaid_orders', $unpaid_orders)
		->with('paid_orders', $paid_orders);
	}

	public function logistics(){

		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		//check if user is allowed in this view
		if(\Auth::user()->user_type != 'logistics')
		{
			return redirect('users/'. \Auth::user()->user_type);
		}

		$total_drivers = \DB::table('drivers')
		->count();
		$available_drivers = \DB::table('drivers')
		->where('is_available', '=', 0)
		->count();

		$total_trucks = \DB::table('trucks')
		->count();
		$available_trucks = \DB::table('trucks')
		->where('is_available', '=', 0)
		->count();
		$trucks_in_route = \DB::table('trucks')
		->where('is_available', '=', 1)
		->where('is_in_service', '=', 0)
		->count();
		$trucks_in_service = \DB::table('trucks')
		->where('is_in_service', '=', 1)
		->count();

		$total_routes = \DB::table('routes')
		->count();

		$most_frecuent_destination = \DB::table('routes')
		->select(\DB::raw('destination, count(destination) as destination_count'))
		->groupBy('destination')
		->orderBy('destination_count')
		->pluck('destination');


		return view('users.logistics')
		->with('total_drivers', $total_drivers)
		->with('available_drivers', $available_drivers)
		->with('total_trucks', $total_trucks)
		->with('available_trucks', $available_trucks)
		->with('trucks_in_route', $trucks_in_route)
		->with('trucks_in_service', $trucks_in_service)
		->with('total_routes', $total_routes)
		->with('most_frecuent_destination', $most_frecuent_destination);
	}

	public function admin(){

		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		//check if user is allowed in this view
		if(\Auth::user()->user_type != 'admin')
		{
			return redirect('users/'. \Auth::user()->user_type);
		}

		$client_number = \DB::table('users')
		->select(\DB::raw('count(distinct user_type) as client_count'))
		->where('user_type', '=', 'client')
		->pluck('client_count');

		$top_5 = array();

		$top_5_products = \DB::table('orders')
		->select(\DB::raw('product_id, count(order_number) as order_count'))
		->groupBy('product_id')
		->orderBy('order_count', 'desc')
		->take(5)
		->get();

		$total_orders = \DB::table('orders')
		->select(\DB::raw('count(order_number) as total_orders'))
		->pluck('total_orders');

		if($total_orders > 0)
		{
			foreach ($top_5_products as $product) {
				$top_5 [] = array(
					'product_name' => \DB::table('products')->where('id', $product->product_id)->pluck('product_name'),
					'percentage' => round( ($product->order_count * 100)/$total_orders, 2)
				);
			}
		}
		else
		{
			$top_5 [] = array(
					'product_name' => 'N/A',
					'percentage' => 0.0
				);
		}

		$number_of_trucks = \DB::table('trucks')->count();

		$average_price = round(\DB::table('products')->avg('price'), 2);

		$number_of_products = \DB::table('products')->count();

		return view('users.admin')
		->with('client_number', $client_number)
		->with('top_5', $top_5)
		->with('number_of_trucks', $number_of_trucks)
		->with('average_price', $average_price)
		->with('number_of_products', $number_of_products);
	}

	public function redirect(){

		//Since the AuthController redirects to /users, 
		//the application will redirect to the actual
		//view

		if(\Auth::user()->user_type == 'admin')
		{
			return redirect('/users/admin');
		}
		elseif(\Auth::user()->user_type == 'billing'){
			return redirect('/users/billing');
		}	
		elseif(\Auth::user()->user_type == 'client_service'){
			return redirect('/users/client_service');
		}
		elseif(\Auth::user()->user_type == 'client'){
			return redirect('/users/client');
		}
		elseif(\Auth::user()->user_type == 'maintenance'){
			return redirect('/users/maintenance');
		}
		else{
			return redirect('/users/logistics');
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		//creating users table
		$users = User::all();
		return view('users.index', compact('users'));
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

		return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UsersForm $usersForm)
	{
		//

		$user = new User;

		$user->name = \Request::input('name');
		$user->last_name = \Request::input('last_name');
		$user->email = \Request::input('email');
		$user->password = \Hash::make(\Request::input('password'));
		$user->company = \Request::input('company');
		$user->user_type = \Request::input('user_type');

		$user->save();

		return redirect('users')->with('message', 'Se han agregado correctamente los datos.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, UsersForm $usersForm)
	{
		//

		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}

		$user = User::findOrFail($id);


		return view('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//check if user is logged in
		if(!\Auth::check())
		{
			return redirect('welcome');
		}
		//
		$user = User::findOrFail($id);

		return view('users.edit', compact('user'));
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

		$user = User::findOrFail($id);

		$user->name = \Request::input('name');
		$user->last_name = \Request::input('last_name');
		$user->email = \Request::input('email');
		$user->password = \Hash::make(\Request::input('password'));
		$user->company = \Request::input('company');
		$user->user_type = \Request::input('user_type');

		$user->save();

		return redirect('users')->with('message', 'Se han actualizado correctamente los datos.');

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

		$input = User::findOrFail($id);

		$input->delete();

		return redirect('users')->with('message', 'Se han eliminado correctamente los datos.');
	}

}
