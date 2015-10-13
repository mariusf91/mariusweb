<?php

class FilesController extends \BaseController {

	public function ReloadCurrencies(){
		$json = file_get_contents('https://openexchangerates.org/api/latest.json?app_id=06dac920814746d7a0ebe468b47a411c');
		File::put(public_path('json/countries/currencyrates.json'), $json);

		return Response::json("Ok");
	}
}
