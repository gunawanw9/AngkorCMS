<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Input;

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

	protected $redirectPath = '/';
	protected $loginPath = '/';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct() {

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	* Handle an authentication attempt.
	*
	* @return Response
	*/
	public function authenticate()
	{
		$login = Input::get('login');
		$password = Input::get('password');
		$remember = Input::has('remember') ? 1 : 0;

		if (Auth::attempt(['email' => $login, 'password' => $password], $remember) || Auth::attempt(['name' => $login, 'password' => $password], $remember)) {
			// Authentication passed...
			//return 'Mort de rire';
			return redirect()->intended('dashboard');
		}
	}

}
