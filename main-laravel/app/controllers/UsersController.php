<?php

class UsersController extends \BaseController {

	public function create()
	{
		$rules = array(
			'username' => 'required|alpha_dash|between:3,15|unique:users',
			'password' => 'required|between:3,25',
			'password2' => 'same:password'
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()) {
			return Redirect::back()->withErrors($validator);
		}else{
			$username = Input::get('username');
			$password = Input::get('password');
			User::create(array(
				'username' => $username,
				'password' => Hash::make($password)
			));
		}

		if(Input::has('from')){
			return Redirect::to(Input::get('from'));;
		}

		return Redirect::to('login')->with('message', 'User successfully created!');
	}
}
