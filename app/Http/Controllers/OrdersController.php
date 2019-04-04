<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Http\Models\OrdersModel;
use App\Http\Models\ClientsModel;
use App\Http\Models\ManagersModel;
use App\Http\Models\POSModel;

class OrdersController extends Controller {

    public function list( Request $request ) {

        $searchString = $request->query( 'search' );

        $list = OrdersModel::list( $searchString );

        $result = [
            'orders' => $list
        ];

        return view( 'orders/search', $result );

    }

    public function edit( Request $request, $id ) {

        $clients    = ClientsModel::list();
        $managers   = ManagersModel::list();
        $pos        = POSModel::list();
        $products   = OrdersModel::getAvailableProducts();

        if( $id != 'create' ) {

            $order = OrdersModel::get( $id );

            $result = [
                'manager'       => $order->UserID,
                'client'        => $order->ClientID,
                'pos'           => $order->PointOfSaleID,
                'orderProducts' => $order->Products,
                'clientsList'   => $clients,
                'managersList'  => $managers,
                'posList'       => $pos,
                'productsList'  => $products,
            ];

        } else {

            $result = $request->old();

            $result['clientsList']      = $clients;
            $result['managersList']     = $managers;
            $result['posList']          = $pos;
            $result['productsList']     = $products;

        }

        return view( 'orders/edit', $result );

    }

    public function create( Request $request ) {

        $rules = [
            'manager'  => 'required',
            'client'  => 'required',
            'pos'     => 'required'
        ];

        $validator = Validator::make( $request->all(), $rules );

        if( $validator->fails() ) {

            return redirect( '/orders/create' )->withErrors( $validator )->withInput();

        } else {

            $productsRaw = json_decode( $request->input( 'orderProducts' ) );

            $data = [
                'UserID'        => $request->input( 'manager' ),
                'ClientID'      => $request->input( 'client' ),
                'PointOfSaleID' => $request->input( 'pos' ),
                'Amount'        => $request->input( 'totalAmount' ),
                'Date'          => date( 'Y-m-d H:i:s', time() )
            ];

            $id = OrdersModel::create( $data );

            $products = [];

            foreach( $productsRaw as $product ) {

                if( isset( $product->ProductServiceID ) ) {

                    $products[] = [
                        'OrderID'           => $id,
                        'ProductServiceID'  => $product->ProductServiceID,
                        'Quantity'          => $product->Quantity,
                        'Price'             => $product->Price,
                        'Amount'            => $product->Amount
                    ];

                }

            }

            OrdersModel::insertUpdateProducts( $id, $products );

            return redirect( '/orders/' . $id );

        }

    }

    public function update( Request $request, $id ) {
        
        $rules = [
            'manager'  => 'required',
            'client'  => 'required',
            'pos'     => 'required'
        ];

        $validator = Validator::make( $request->all(), $rules );

        if( $validator->fails() ) {

            return redirect( '/orders/' . $id )->withErrors( $validator )->withInput();

        } else {

            $productsRaw = json_decode( $request->input( 'orderProducts' ) );

            $data = [
                'UserID'        => $request->input( 'manager' ),
                'ClientID'      => $request->input( 'client' ),
                'PointOfSaleID' => $request->input( 'pos' ),
                'Amount'        => $request->input( 'totalAmount' )
            ];

            OrdersModel::update( $id, $data );

            $products = [];

            foreach( $productsRaw as $product ) {

                if( isset( $product->ProductServiceID ) ) {

                    $products[] = [
                        'OrderID'           => $id,
                        'ProductServiceID'  => $product->ProductServiceID,
                        'Quantity'          => $product->Quantity,
                        'Price'             => $product->Price,
                        'Amount'            => $product->Amount
                    ];

                }

            }

            OrdersModel::insertUpdateProducts( $id, $products );

            return redirect( '/orders/' . $id );

        }

    }

    public function delete( $id ) {

        OrdersModel::delete( $id );

        return redirect( '/orders' );

    }
    
}

?>