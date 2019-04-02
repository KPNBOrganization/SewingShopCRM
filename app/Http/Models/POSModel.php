<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class POSModel {

    public static function list() {

        $result = DB::table( 'PointOfSale' )->orderBy( 'ID', 'DESC' )->get();

        return $result;

    }

    public static function get( $id ) {

        $result = DB::table( 'PointOfSale' )->where( 'ID', '=', $id )->get();

        if( isset( $result[0] ) ) {

            return $result[0];

        } else {

            return false;

        }

    }

    public static function create( $data ) {

        $result = DB::table( 'PointOfSale' )->insertGetId( $data );

        return $result;

    }

    public static function update( $id, $data ) {

        DB::table( 'PointOfSale' )->where( 'ID', '=', $id )->update( $data );

    }

    public static function delete( $id ) {

        DB::table( 'PointOfSale' )->where( 'ID', '=', $id )->delete();

    }

}

?>