<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class ClientsModel {

	public static function list(){

		$result = DB::table('t_clients')->get();

		return $result;
	}

	public static function get ( $id ){

		$result = DB::table('t_clients')->where('ID', '=',$id)->get();

		return $result;
	}
}

?>