<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Http\Models\PaymentsModel;

class PaymentsController extends Controller {

    public function list() {

        $list = PaymentsModel::list();

        $result = [
            'payments'   => $list
        ];

        return view( 'payments/search', $result );

    }

    public function edit( Request $request, $id ) {

        if( $id != 'create' ) {

            $payments = PaymentsModel::get( $id );

            $result = [
                'amount'    => $payments->Address,
                'userid'    => $payments->UserID,
                'orderid'   => $payments->OrderID
            ];

        } else {

            $result = $request->old();

        }

        return view( 'payments/edit', $result );

    }

    public function create( Request $request ) {

        $rules = [
            'amount'  => 'required',
            'userid'    => 'required',
            'orderid'   => 'required'
        ];

        $validator = Validator::make( $request->all(), $rules );

        if( $validator->fails() ) {

            return redirect( '/payments/create' )->withErrors( $validator )->withInput();

        } else {

            $data = [
                'Date'      => date( 'Y-m-d H:i:s', time() ),
                'Amount'    => $request->input( 'amount' ),
                'UserID'    => $request->input( 'userid' ),
                'OrderID'   => $request->input( 'orderid' )

            ];

            $id = PaymentsModel::create( $data );

            return redirect( '/payments/' . $id );

        }

    }

    public function update( Request $request, $id ) {
        
        $rules = [
            'amount'   => 'required',
            'userid'   => 'required',
            'orderid'  => 'required'
        ];

        $validator = Validator::make( $request->all(), $rules );

        if( $validator->fails() ) {

            return redirect( '/payments/' . $id )->withErrors( $validator )->withInput();

        } else {

            $data = [
                'Amount'   => $request->input( 'amount' ),
                'UserID'   => $request->input( 'userid' ),
                'OrderID'  => $request->input( 'orderid' )
            ];

            PaymentsModel::update( $id, $data );

            return redirect( '/payments/' . $id );

        }

    }

}

?>