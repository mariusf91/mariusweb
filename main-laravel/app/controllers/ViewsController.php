<?php

class ViewsController extends \BaseController {

	public function welcome(){
		return View::make('pages.welcome');
	}

	public function login(){
		return View::make('users.login');
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}

	public function register(){
		if (Input::has('from'))
		{
			return View::make('users.register')->with('from', Input::get('from'));
		}else{
			return View::make('users.register');
		}
	}

	public function command(){
		return View::make('pages.command');
	}

	public function crappyBird(){
		return View::make('fusion.crappybird');
	}

	public function skydumpTimed(){
		return View::make('fusion.skydump-timed');
	}

	public function skydumpSurvival(){
		return View::make('fusion.skydump-survival');
	}

}
