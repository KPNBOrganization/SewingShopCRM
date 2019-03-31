<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Models\ManagersModel;

class ManagersController extends Controller {

    public function list() {

        $list = ManagersModel::list();

        $result = [
            'managers' => $list
        ];

        return view( 'managers/search', $result );

    }

    public function edit( $id ) {

        if( $id != 'create' ) {

           $result = [
                'manager' => ManagersModel::get( $id )
           ];

        } else {

            $result = [
                'manager' => []
            ];

        }

        return view( 'managers/edit', $result );

    }

    public function create( Request $request ) {

        $data = [
            'Username'  => $request->input( 'Username' ),
            'Password'  => Hash::make( $request->input( 'Password' ) ),
            'Email'     => $request->input( 'Email' ),
            'Phone'     => $request->input( 'Phone' ),
            'Role'      => ManagersModel::MANAGER_ROLE,
            'FullName'  => $request->input( 'FullName' )
        ];

        $id = ManagersModel::create( $data );

        return redirect( '/managers/' . $id );

    }

    public function update( Request $request, $id ) {

        $data = [
            'Username'  => $request->input( 'Username' ),
            'Email'     => $request->input( 'Email' ),
            'Phone'     => $request->input( 'Phone' ),
            'FullName'  => $request->input( 'FullName' )
        ];

        if( strlen( $request->input( 'Password' ) ) > 0 ) {

            $data['Password'] = Hash::make( $request->input( 'Password' ) );

        }

        ManagersModel::update( $id, $data );

        return redirect( '/managers/' . $id );

    }

    public function delete( $id ) {

        ManagersModel::delete( $id );

        return redirect( '/managers' );

    }

}

?>