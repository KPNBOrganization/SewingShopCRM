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

Route::get( '/', function ( Request $request ) {

    if( $request->session()->exists( 'user' ) ) {

        return view( 'welcome' );

    } else {

        return view( 'authorization/login' );

    }

} );

Route::post( '/', 'AuthorizationController@login' );
Route::get( '/logout', 'AuthorizationController@logout' );

// MANAGERS

Route::get( '/managers', 'ManagersController@list' );
Route::get( '/managers/{id}', 'ManagersController@edit' );

Route::post( '/managers/create', 'ManagersController@create' );
Route::post( '/managers/{id}', 'ManagersController@update' );
Route::delete( '/managers/{id}', 'ManagersController@delete' );

// CLIENTS

Route::get( '/clients', 'ClientsController@list' );
Route::get( '/clients/{id}', 'ClientsController@edit' );

Route::post( '/clients/create', 'ClientsController@create' );
Route::post( '/clients/{id}', 'ClientsController@update' );
Route::delete( '/clients/{id}', 'ClientsController@delete' );
