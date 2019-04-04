<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Http\Models\ProductsServicesModel;

class ProductsServicesController extends Controller {

    public function list() {

        $list = ProductsServicesModel::list();

        $result = [
            'products' => $list
        ];

        return view( 'products-services/search', $result );

    }

    public function edit( Request $request, $id ) {

        if( $id != 'create' ) {

            $product = ProductsServicesModel::get( $id );

            $result = [
                'article'       => $product->Article,
                'name'          => $product->Name,
                'description'   => $product->Description,
                'price'         => $product->Price,
                // 'quantity'       => $product->Quantity
            ];

        } else {

            $result = $request->old();

        }

        return view( 'products-services/edit', $result );

    }

    public function create( Request $request ) {

        $rules = [
            'article'       => 'required|unique:ProductsServices,Article',
            'name'          => 'required',
            'description'   => 'required',
            'price'         => 'required',
            // 'quantity'      => 'required'
        ];

        $validator = Validator::make( $request->all(), $rules );

        if( $validator->fails() ) {

            return redirect( '/products-services/create' )->withErrors( $validator )->withInput();

        } else {

            $data = [
                'Article'       => $request->input( 'article' ),
                'Name'          => $request->input( 'name' ),
                'Description'   => $request->input( 'description' ),
                'Price'         => $request->input( 'price' ),
                'Quantity'      => 0
            ];

            $id = ProductsServicesModel::create( $data );

            return redirect( '/products-services/' . $id );

        }

    }

    public function update( Request $request, $id ) {
        
        $rules = [
            'article'  => [
                'required',
                Rule::unique( 'ProductsServices', 'Article' )->ignore( $id, 'ID' )
            ],
            'name'          => 'required',
            'description'   => 'required',
            'price'         => 'required',
            // 'quantity'      => 'required'
        ];

        $validator = Validator::make( $request->all(), $rules );

        if( $validator->fails() ) {

            return redirect( '/products-services/' . $id )->withErrors( $validator )->withInput();

        } else {

            $data = [
                'Article'       => $request->input( 'article' ),
                'Name'          => $request->input( 'name' ),
                'Description'   => $request->input( 'description' ),
                'Price'         => $request->input( 'price' ),
                // 'Quantity'      => $request->input( 'quantity' )
            ];

            ProductsServicesModel::update( $id, $data );

            return redirect( '/products-services/' . $id );

        }

    }

    public function delete( $id ) {

        ProductsServicesModel::delete( $id );

        return redirect( '/products-services' );

    }

}

?>