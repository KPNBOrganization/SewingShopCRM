<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Http\Models\ReportsModel;

class ReportsController extends Controller {

    public function pos () {

    	return view('reports/pos');
    }

    public function orders() {

    	return view('reports/orders');
    }
}


?>