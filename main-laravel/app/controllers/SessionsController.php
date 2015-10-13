<?php

class SessionsController extends \BaseController {



	public function store()
	{
		$dataAttempt = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($dataAttempt, true)){
			return Redirect::intended('welcome');
		}else{
			return Redirect::to('login');
		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}


}
