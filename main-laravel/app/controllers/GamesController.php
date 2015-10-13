<?php

class GamesController extends \BaseController {

	public function highscore(){
		$top = 25;
		if (Input::has('top'))
		{
			$top = Input::get('top');
		}
		$scores = DB::table('crappybird')
			->orderBy('score', 'desc')
			->take($top)
			->get();

		$users =DB::table('users')->get();
		$result = "";
		$counter = 1;
		foreach($scores as $cell){
			foreach($users as $user){
				if($cell->user_id == $user->id){
					$result = $result . $counter . " " . $user->username . ": " . $cell->score . "<br />" ;
					$counter++;
				}
			}

		}
		return $result;
	}

	public function record(){
		$user_id = Input::get('user_id');
		$score = Input::get('score');
		$map_of_death = Input::get('map_of_death');

		CrappyBird::create(array(
			'user_id' => $user_id,
			'score' => $score,
			'map_of_death' => $map_of_death
		));

		return "Success";
	}

	public function login(){
		$username = Input::get('username');
		$password = Input::get('password');
		$user = DB::table('users')->where('username', $username)->first();
		if(Hash::check($password, $user->password)){
			return $user->id;
		}else{
			return "0";
		}
	}

	public function test(){
		$user_id = Input::get('user_id');
		$score = Input::get('score');
		$map_of_death = Input::get('map_of_death');

		CrappyBird::create(array(
			'user_id' => $user_id,
			'score' => $score,
			'map_of_death' => $map_of_death
		));

		return "Success";
	}
}
