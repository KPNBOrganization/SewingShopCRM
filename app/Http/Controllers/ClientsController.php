<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Http\Models\ClientsModel;

class ClientsController extends Controller {

    public function list( Request $request ) {

        $searchString = $request->query( 'search' );

        $list = ClientsModel::list( $searchString );

        $result = [
            'clients' => $list
        ];

        return view( 'clients/search', $result );

    }

    public function edit( Request $request, $id ) {

        if( $id != 'create' ) {

            $client = ClientsModel::get( $id );

            $result = [
                'username'  => $client->Username,
                'email'     => $client->Email,
                'phone'     => $client->Phone,
                'fullName'  => $client->FullName
            ];

        } else {

            $result = $request->old();

        }

        return view( 'clients/edit', $result );

    }

    public function create( Request $request ) {

        $rules = [
            'username'  => 'required|unique:Users,Username',
            'password'  => 'required',
            'email'     => 'required',
            'fullName'  => 'required'
        ];

        $validator = Validator::make( $request->all(), $rules );

        if( $validator->fails() ) {

            return redirect( '/clients/create' )->withErrors( $validator )->withInput();

        } else {

            $data = [
                'Username'  => $request->input( 'username' ),
                'Password'  => Hash::make( $request->input( 'password' ) ),
                'Email'     => $request->input( 'email' ),
                'Phone'     => $request->input( 'phone' ),
                'Role'      => ClientsModel::CLIENT_ROLE,
                'FullName'  => $request->input( 'fullName' )
            ];

            $id = ClientsModel::create( $data );

            return redirect( '/clients/' . $id );

        }

    }

    public function update( Request $request, $id ) {
        
        $rules = [
            'username'  => [
                'required',
                Rule::unique( 'Users', 'Username' )->ignore( $id, 'ID' )
            ],
            'email'     => 'required',
            'fullName'  => 'required'
        ];

        $validator = Validator::make( $request->all(), $rules );

        if( $validator->fails() ) {

            return redirect( '/clients/' . $id )->withErrors( $validator )->withInput();

        } else {

            $data = [
                'Username'  => $request->input( 'username' ),
                'Email'     => $request->input( 'email' ),
                'Phone'     => $request->input( 'phone' ),
                'FullName'  => $request->input( 'fullName' )
            ];

            if( strlen( $request->input( 'password' ) ) > 0 ) {

                $data['Password'] = Hash::make( $request->input( 'password' ) );

            }

            ClientsModel::update( $id, $data );

            return redirect( '/clients/' . $id );

        }

    }

    public function delete( $id ) {

        clientsModel::delete( $id );

        return redirect( '/clients' );

    }

}

?>