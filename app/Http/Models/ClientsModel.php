<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class ClientsModel {

    const CLIENT_ROLE = 3;

    public static function list( $searchString ) {

        $result = DB::table( 'Users' )
            ->where( 'Role', '=', self::CLIENT_ROLE )
            ->where( function( $query ) use( $searchString ) {

                $query->where( 'FullName', 'LIKE', '%' . $searchString . '%' )
                    ->orWhere( 'Phone', 'LIKE', '%' . $searchString . '%' )
                    ->orWhere( 'Email', 'LIKE', '%' . $searchString . '%' );

            } )
            ->orderBy( 'ID', 'DESC' )
            ->get();

        return $result;

    }

    public static function get( $id ) {

        $result = DB::table( 'Users' )->where( 'ID', '=', $id )->get();

        if( isset( $result[0] ) ) {

            return $result[0];

        } else {

            return false;

        }

    }

    public static function create( $data ) {

        $result = DB::table( 'Users' )->insertGetId( $data );

        return $result;

    }

    public static function update( $id, $data ) {

        DB::table( 'Users' )->where( 'ID', '=', $id )->update( $data );

    }

    public static function delete( $id ) {

        DB::table( 'Users' )->where( 'ID', '=', $id )->delete();

    }

}

?>