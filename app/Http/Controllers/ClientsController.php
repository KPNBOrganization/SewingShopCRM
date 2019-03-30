<?php

namespace App\Http\Controllers;

use App\Http\Models\ClientsModel;

class ClientsController extends Controller {

	public function list(){

		$clients = clientsModel::list();

		return $clients;
	}

	public function get( $id ){

		$client = ClientsModel::get( $id );

		return view('clients/single',[ 'client' => $client[0] ]);
	}
}

?>