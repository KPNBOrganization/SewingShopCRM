<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class ReportsModel {



    public static function getPosReport(  ) {

        $result = DB::table( 'PointOfSale' )
                ->select(
                    '*',
                    DB::raw('
                        (

                            SELECT
                                SUM( Orders.Amount )
                            FROM
                                Orders
                            WHERE
                                Orders.PointOfSaleID = PointOfSale.ID
                        ) AS Amount
                    ')
                )
                ->orderBy( 'ID', 'DESC' )
                ->get();

        return $result;

    }

    public static function getOrdersLastMonth() {

    			$date = date( 'Y-m-d H:i:s', time() - 30 * 24 * 60 * 60 );

    	        $result = DB::table( 'Orders' )
                        ->select(
                            '*',
                            DB::raw( '( SELECT FullName FROM Users WHERE Users.ID = UserID ) AS Manager' ),
                            DB::raw( '( SELECT FullName FROM Users WHERE Users.ID = ClientID ) AS Client' ),
                            DB::raw( '( SELECT Name FROM PointOfSale WHERE PointOfSale.ID = PointOfSaleID ) AS PointOfSale' )
                        )
                        ->whereDate('Date', '>', $date)
                        ->orderBy( 'ID', 'DESC' )
                        ->get();

        return $result;

    }

}

?>