<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class ProductsServicesModel {

    public static function list() {

        $result = DB::table( 'ProductsServices' )->orderBy( 'ID', 'DESC' )->get();

        return $result;

    }

    public static function get( $id ) {

        $result = DB::table( 'ProductsServices' )->where( 'ID', '=', $id )->get();

        if( isset( $result[0] ) ) {

            return $result[0];

        } else {

            return false;

        }

    }

    public static function create( $data ) {

        $result = DB::table( 'ProductsServices' )->insertGetId( $data );

        return $result;

    }

    public static function update( $id, $data ) {

        DB::table( 'ProductsServices' )->where( 'ID', '=', $id )->update( $data );

    }

    public static function delete( $id ) {

        DB::table( 'ProductsServices' )->where( 'ID', '=', $id )->delete();

    }

}

?>