<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersProductsServicesAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('OrdersProductsServices', function (Blueprint $table) {

            $table->foreign( 'OrderID' )->references( 'ID' )->on( 'Orders' );
            $table->foreign( 'ProductServiceID' )->references( 'ID' )->on( 'ProductsServices' );

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('OrdersProductsServices', function (Blueprint $table) {
            
            $table->dropForeign( 'OrdersProductsServices_OrderID_foreign' );
            $table->dropForeign( 'OrdersProductsServices_ProductServiceID_foreign' );
            
        });
    }
}
