<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Http\Models\POSModel;

class POSController extends Controller {

    public function list() {

        $list = POSModel::list();

        $result = [
            'pos'   => $list
        ];

        return view( 'pos/search', $result );

    }

    public function edit( Request $request, $id ) {

        if( $id != 'create' ) {

            $pos = POSModel::get( $id );

            $result = [
                'name'      => $pos->Name,
                'address'   => $pos->Address,
            ];

        } else {

            $result = $request->old();

        }

        return view( 'pos/edit', $result );

    }

    public function create( Request $request ) {

        $rules = [
            'name'  => 'required'
        ];

        $validator = Validator::make( $request->all(), $rules );

        if( $validator->fails() ) {

            return redirect( '/pos/create' )->withErrors( $validator )->withInput();

        } else {

            $data = [
                'Name'      => $request->input( 'name' ),
                'Address'   => $request->input( 'address' )
            ];

            $id = POSModel::create( $data );

            return redirect( '/pos/' . $id );

        }

    }

    public function update( Request $request, $id ) {
        
        $rules = [
            'name'  => 'required'
        ];

        $validator = Validator::make( $request->all(), $rules );

        if( $validator->fails() ) {

            return redirect( '/pos/' . $id )->withErrors( $validator )->withInput();

        } else {

            $data = [
                'Name'      => $request->input( 'name' ),
                'Address'   => $request->input( 'address' )
            ];

            POSModel::update( $id, $data );

            return redirect( '/pos/' . $id );

        }

    }

    public function delete( $id ) {

        POSModel::delete( $id );

        return redirect( '/pos' );

    }

}

?>