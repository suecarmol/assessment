<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;


	/*if(Auth::user()->user_type == 'admin'){
		protected $redirectTo = '/users';
	}
	elseif(Auth::user()->user_type == 'maintenance'){
		protected $redirectTo = '/trucks';
	}
	elseif (Auth::user()->user_type == 'billing') {
		protected $redirectTo = '/bills';
	}
	elseif (Auth::user()->user_type == 'client_service') {
		protected redirectTo = "/orders"
	}
	elseif(Auth::user()->user_type == 'logistics'){
		protected $redirectTo = '/routes'
	}
	elseif(Auth::user()->user_type == 'client'){
		protected $redirectTo = '/orders';
	}
	else{
		protected $redirectTo = '/auth/login';
	}*/


	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

}
