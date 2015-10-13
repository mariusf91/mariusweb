<?php

class DatabaseController extends \BaseController {

	public function CreateDatabase(){

	}

	public function ReadDatabase(){

		$table = Input::get('table');
		if($table === 'users'){
			return "Access denied for table USERS.";
		}
		$dbContent = DB::table($table)->get();
		$tableContent = "<table>";
		$columns = Schema::getColumnListing('users');
		$tableContent = $tableContent . "<tr class='area-text-green'>";
		foreach($columns as $column){
			$tableContent = $tableContent . "<td class='area-td-green' style='padding: 5px;'>" . $column  . "</td>";
		}
		$tableContent = $tableContent . "</tr>";
		foreach($dbContent as $row){
			$tableContent = $tableContent . "<tr class='area-text-green'>";
			foreach($row as $element){
				$element = (strlen($element) > 15) ? substr($element,0,10).'..' : $element;
				$tableContent = $tableContent . "<td class='area-td-green'>" . $element  . "</td>";
			}
			$tableContent = $tableContent . "</tr>";
		}
		$tableContent = $tableContent . "</table>";
		return $tableContent;
	}

	public function UpdateDatabase(){
		return "Function not implemented.";
	}

	public function DeleteDatabase(){
		return "Function not implemented.";
	}

	public function ManualDatabase(){
		return "Function not implemented.";
	}


}
