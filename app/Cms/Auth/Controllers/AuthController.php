<?php namespace Cms\Auth\Controllers;

class AuthController extends BaseController {

	public function login()
	{
		if (\Auth::check()) {
			return \Redirect::intended(\URL::route('me.index'));
		}

		$this->layout->content = \View::make('auth.login');
	}

	public function postLogin()
	{
		$credentials = \Input::only(['email', 'password']);
		$remember = \Input::get('remember') ? true : false;

		if (!\Auth::attempt($credentials, $remember)) {
			return \Redirect::route('login')
			->with('error', 'Email or password are incorrect.');
		} 

		return \Redirect::intended(\URL::route('me.index'));
	}

	public function logout()
	{
		\Auth::logout();

		return \Redirect::to('/');
	}

}
