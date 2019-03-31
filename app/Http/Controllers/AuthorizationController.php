<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Models\UsersModel;

class AuthorizationController extends Controller {

    public function login( Request $request ) {

        $username = $request->input( 'username' );
        $password = $request->input( 'password' );

        $user = UsersModel::getByUsername( $username );

        if( $user ) {

            if( Hash::check( $password, $user->Password ) ) {

                $request->session()->put( 'user', $user );
                
                return redirect( '/' );

            }

        }

        $result = [
            'error' => 'Wrong login details.'
        ];

        return view( 'authorization/login', $result );

    }

    public function logout( Request $request ) {

        $request->session()->flush();

        return redirect( '/' );

    }

}

?>