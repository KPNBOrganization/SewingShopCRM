<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Http\Models\PaymentsModel;
use App\Http\Models\OrdersModel;
use App\Http\Models\ManagersModel;

class PaymentsController extends Controller {

    public function list() {

        $list = PaymentsModel::list();

        $result = [
            'payments'   => $list
        ];

        return view( 'payments/search', $result );

    }

    public function edit( Request $request, $id ) {

        $orders = OrdersModel::list();
        $managers = ManagersModel::list();

        if( $id != 'create' ) {

            $payments = PaymentsModel::get( $id );

            $result = [
                'amount'        => $payments->Amount,
                'userid'        => $payments->UserID,
                'orderid'       => $payments->OrderID,
                'ordersList'    => $orders,
                'managersList'  => $managers
            ];

        } else {

            $result = $request->old();

            $result['ordersList'] = $orders;
            $result['managersList'] = $managers;

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