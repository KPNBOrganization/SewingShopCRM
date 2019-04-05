<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

use App\Http\Models\ClientsModel;
use App\Http\Models\ManagersModel;

class OrdersModel {

    public static function list( $searchString = '', $clientid = false ) {

        $query = DB::table( 'Orders' )
                        ->select(
                            '*',
                            DB::raw( '( SELECT FullName FROM Users WHERE Users.ID = UserID ) AS Manager' ),
                            DB::raw( '( SELECT FullName FROM Users WHERE Users.ID = ClientID ) AS Client' ),
                            DB::raw( '( SELECT Name FROM PointOfSale WHERE PointOfSale.ID = PointOfSaleID ) AS PointOfSale' )
                        )
                        ->where( function( $query ) use ( $searchString ) {

                            $query->whereRaw( '
                                    UserID IN(

                                        SELECT 
                                            ID 
                                        FROM 
                                            Users 
                                        WHERE 
                                            FullName LIKE "%' . $searchString . '%"
                                        AND 
                                            Role = ' . ManagersModel::MANAGER_ROLE . '

                                    )
                                ' )
                                ->orWhereRaw( '
                                    ClientID IN(

                                        SELECT 
                                            ID 
                                        FROM 
                                            Users 
                                        WHERE 
                                            FullName LIKE "%' . $searchString . '%"
                                        AND 
                                            Role = ' . ClientsModel::CLIENT_ROLE . '

                                    )
                                ' )
                                ->orWhereRaw( '
                                    PointOfSaleID IN(

                                        SELECT 
                                            ID 
                                        FROM 
                                            PointOfSale 
                                        WHERE 
                                            Name LIKE "%' . $searchString . '%"

                                    )
                                ' );
            
                        } );
        
        if( $clientid ) {

            $query->where( 'ClientID', '=', $clientid );

        }
        
        $query->orderBy( 'ID', 'DESC' );

        $result = $query->get();

        return $result;

    }

    public static function get( $id ) {

        $result  = DB::table( 'Orders' )->where( 'ID', '=', $id )->get();

        if( isset( $result[0] ) ) {

            $products = DB::table( 'OrdersProductsServices' )
                            ->join( 
                                'ProductsServices', 
                                'OrdersProductsServices.ProductServiceID', 
                                '=', 
                                'ProductsServices.ID' 
                            )
                            ->select( 
                                'OrdersProductsServices.ProductServiceID', 
                                'OrdersProductsServices.Quantity',
                                'OrdersProductsServices.Price',
                                'ProductsServices.Name',
                                'ProductsServices.Description'
                            )
                            ->where( 'OrderID', '=', $id )
                            ->get();

            $result[0]->Products = $products;

            return $result[0];

        } else {

            return false;

        }

    }

    public static function getAvailableProducts() {

        $result = DB::table( 'ProductsServices' )->get();

        return $result;

    }

    public static function insertUpdateProducts( $id, $products ) {

        DB::table( 'OrdersProductsServices' )->where( 'OrderID', '=', $id )->delete();
        DB::table( 'OrdersProductsServices' )->insert( $products );

    }

    public static function create( $data ) {

        $result = DB::table( 'Orders' )->insertGetId( $data );
        
        return $result;

    }

    public static function update( $id, $data ) {

        DB::table( 'Orders' )->where( 'ID', '=', $id )->update( $data );

    }

    public static function delete( $id ) {

        DB::table( 'Orders' )->where( 'ID', '=', $id )->delete();
        DB::table( 'OrdersProductsServices' )->where( 'OrderID', '=', $id )->delete();

    }

}

?>