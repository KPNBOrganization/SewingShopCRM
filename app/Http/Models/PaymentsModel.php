<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class PaymentsModel {

    public static function list() {

        $result = DB::table( 'Payments' )
                    ->select(
                        '*',
                        DB::raw( '( SELECT FullName FROM Users WHERE Users.ID = UserID ) AS Manager' )
                    )
                    ->orderBy( 'ID', 'DESC' )
                    ->get();

        return $result;

    }

    public static function get( $id ) {

        $result = DB::table( 'Payments' )->where( 'ID', '=', $id )->get();

        if( isset( $result[0] ) ) {

            return $result[0];

        } else {

            return false;

        }

    }

    public static function create( $data ) {

        $result = DB::table( 'Payments' )->insertGetId( $data );

        return $result;

    }

    public static function update( $id, $data ) {

        DB::table( 'Payments' )->where( 'ID', '=', $id )->update( $data );

    }

}

?>