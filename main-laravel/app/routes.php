<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('shittygames/crappybird', 'ViewsController@crappyBird');
Route::get('shittygames/skydump-timed', 'ViewsController@skydumpTimed');
Route::get('shittygames/skydump-survival', 'ViewsController@skydumpSurvival');

Route::get('request.register', 'SessionsController@register');
Route::get('request.login', 'SessionsController@store');
Route::get('request.logout', 'SessionsController@logout');

Route::post('users/create', 'UsersController@create');

Route::get('register', 'ViewsController@register');
Route::get('login', 'ViewsController@login');
Route::get('logout', 'ViewsController@logout');

Route::resource('sessions', 'SessionsController');

Route::get('welcome', 'ViewsController@welcome')->before('auth');

Route::get('command', 'ViewsController@command')->before('auth');

Route::get('shittygames/best', 'GamesController@highscore');
Route::get('shittygames/login', 'GamesController@login');
Route::get('shittygames/record', 'GamesController@record');
Route::get('test', 'GamesController@test');

Route::get('/command/currency/reload',
	[
		'uses' => 'FilesController@ReloadCurrencies',
		'as' => 'ReloadCurrencies'
	]
);

Route::post('/command/database/create',
	[
		'uses' => 'DatabaseController@CreateDatabase',
		'as' => 'CreateDatabase'
	]
);

Route::post('/command/database/read',
	[
		'uses' => 'DatabaseController@ReadDatabase',
		'as' => 'ReadDatabase'
	]
);

Route::post('/command/database/update',
	[
		'uses' => 'DatabaseController@UpdateDatabase',
		'as' => 'UpdateDatabase'
	]
);

Route::post('/command/database/delete',
	[
		'uses' => 'DatabaseController@DeleteDatabase',
		'as' => 'DeleteDatabase'
	]
);

Route::post('/test/sendgrid',
	[
		'uses' => 'TestController@SendGrid',
		'as' => 'SendGrid'
	]
);

