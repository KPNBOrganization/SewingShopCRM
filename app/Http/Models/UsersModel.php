<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class UsersModel {

    const ADMIN_ROLE = 1;
    const MANAGER_ROLE = 2;
    const CLIENT_ROLE = 3;

    public static function getByUsername( $username ) {

        $result = DB::table( 'Users' )->where( 'Username', '=', $username )->get();

        if( isset( $result[0] ) ) {
            
            return $result[0];

        } else {

            return false;

        }

    }

}

?>