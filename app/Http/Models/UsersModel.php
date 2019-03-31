<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class UsersModel {

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