<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Http\Models\ReportsModel;

class ReportsController extends Controller {

    public function pos () {

        $list = ReportsModel::getPosReport();

        $result = [
            'pos' => $list
        ];

    	return view('reports/pos', $result);
    }

    public function orders() {

    	$list = ReportsModel::getOrdersLastMonth();

    	$result = [
    		'orders' => $list
    	];

    	return view( 'reports/orders', $result );
    }
}


?>