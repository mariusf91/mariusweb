<?php

class TestController extends \BaseController {


	public function SendGrid()
	{
		$users = DB::table('customers')->get();

		foreach ($users as $user)
		{
			var_dump($user->name);
		}

		return "ok";
	}



}
