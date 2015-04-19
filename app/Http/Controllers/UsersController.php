<?php namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UsersForm;

class UsersController extends Controller {

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
	public function store()
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
	public function show($id)
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
