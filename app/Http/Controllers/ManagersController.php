<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Http\Models\ManagersModel;

class ManagersController extends Controller {

    public function list() {

        $list = ManagersModel::list();

        $result = [
            'managers' => $list
        ];

        return view( 'managers/search', $result );

    }

    public function edit( Request $request, $id ) {

        if( $id != 'create' ) {

            $manager = ManagersModel::get( $id );

            $result = [
                'username'  => $manager->Username,
                'email'     => $manager->Email,
                'phone'     => $manager->Phone,
                'fullName'  => $manager->FullName
            ];

        } else {

            $result = $request->old();

        }

        return view( 'managers/edit', $result );

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

            return redirect( '/managers/create' )->withErrors( $validator )->withInput();

        } else {

            $data = [
                'Username'  => $request->input( 'username' ),
                'Password'  => Hash::make( $request->input( 'password' ) ),
                'Email'     => $request->input( 'email' ),
                'Phone'     => $request->input( 'phone' ),
                'Role'      => ManagersModel::MANAGER_ROLE,
                'FullName'  => $request->input( 'fullName' )
            ];

            $id = ManagersModel::create( $data );

            return redirect( '/managers/' . $id );

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

            return redirect( '/managers/' . $id )->withErrors( $validator )->withInput();

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

            ManagersModel::update( $id, $data );

            return redirect( '/managers/' . $id );

        }

    }

    public function delete( $id ) {

        ManagersModel::delete( $id );

        return redirect( '/managers' );

    }

}

?>