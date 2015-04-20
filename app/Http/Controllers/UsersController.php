<?php namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UsersForm;

class UsersController extends Controller {


	public function maintenance(){

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
		$trucks_in_service_percentage = round(($trucks_in_service * 100)/$trucks_count, 2);
		$available_trucks_percentage = round(($available_trucks * 100)/$trucks_count, 2);
		$trucks_with_delays_percentage = round(($trucks_with_delays * 100)/$trucks_count, 2);
		$trucks_in_route_percentage = round(($trucks_in_route * 100)/$trucks_count, 2);

		//returning view
		return view('users.maintenance')
		->with('trucks_in_service', $trucks_in_service)
		->with('available_trucks', $available_trucks)
		->with('trucks_with_delays', $trucks_with_delays)
		->with('trucks_in_route', $trucks_in_route)
		->with('trucks_in_service_percentage', $trucks_in_service_percentage)
		->with('available_trucks_percentage', $available_trucks_percentage)
		->with('trucks_with_delays_percentage', $trucks_with_delays_percentage)
		->with('trucks_in_route_percentage', $trucks_in_route_percentage);
	}

	public function billing(){

		return view('users.billing');
	}

	public function client_service(){

		return view('users.client_service');
	}

	public function client(){

		return view('users.client');
	}

	public function logistics(){

		return view('users.logistics');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//

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
