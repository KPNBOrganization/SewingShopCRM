<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

use App\Http\Models\UsersModel;

Route::get( '/', function ( Request $request ) {

    if( $request->session()->exists( 'user' ) ) {

        return view( 'welcome' );

    } else {

        return view( 'authorization/login' );

    }

} );

Route::post( '/', 'AuthorizationController@login' );
Route::get( '/logout', 'AuthorizationController@logout' );

// CLIENTS MODULE

Route::middleware([ 'auth' ])->group(function() {

    // ORDERS

    Route::get( '/orders', 'OrdersController@list' );
    Route::get( '/orders/{id}', 'OrdersController@edit' );

});

// MANAGERS MODULE

Route::middleware([ 'auth', 'role:' . UsersModel::ADMIN_ROLE . ',' . UsersModel::MANAGER_ROLE ])->group( function() {

    // ORDERS

    Route::post( '/orders/create', 'OrdersController@create' );
    Route::post( '/orders/{id}', 'OrdersController@update' );
    Route::delete( '/orders/{id}', 'OrdersController@delete' );

    // CLIENTS

    Route::get( '/clients', 'ClientsController@list' );
    Route::get( '/clients/{id}', 'ClientsController@edit' );

    Route::post( '/clients/create', 'ClientsController@create' );
    Route::post( '/clients/{id}', 'ClientsController@update' );
    Route::delete( '/clients/{id}', 'ClientsController@delete' );

    //PAYMENTS

    Route::get( 'payments', 'PaymentsController@list' );
    Route::get( '/payments/{id}', 'PaymentsController@edit' );

    Route::post( '/payments/create', 'PaymentsController@create' );
    Route::post( '/payments/{id}', 'PaymentsController@update' );

    //REPORTS

    Route::get( 'reports/pos', 'ReportsController@pos' );
    Route::get( 'reports/orders', 'ReportsController@orders' );

});

// ADMIN MODULE

Route::middleware([ 'auth', 'role:' . UsersModel::ADMIN_ROLE ])->group( function() {

    // MANAGERS

    Route::get( '/managers', 'ManagersController@list' );
    Route::get( '/managers/{id}', 'ManagersController@edit' );

    Route::post( '/managers/create', 'ManagersController@create' );
    Route::post( '/managers/{id}', 'ManagersController@update' );
    Route::delete( '/managers/{id}', 'ManagersController@delete' );

    // PRODUCTS/SERVICES

    Route::get( '/products-services', 'ProductsServicesController@list' );
    Route::get( '/products-services/{id}', 'ProductsServicesController@edit' );

    Route::post( '/products-services/create', 'ProductsServicesController@create' );
    Route::post( '/products-services/{id}', 'ProductsServicesController@update' );
    Route::delete( '/products-services/{id}', 'ProductsServicesController@delete' );

    // POS

    Route::get( '/pos', 'POSController@list' );
    Route::get( '/pos/{id}', 'POSController@edit' );

    Route::post( '/pos/create', 'POSController@create' );
    Route::post( '/pos/{id}', 'POSController@update' );
    Route::delete( '/pos/{id}', 'POSController@delete' );

});