<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersProductsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OrdersProductsServices', function (Blueprint $table) {
            
            $table->unsignedInteger( 'OrderID' );
            $table->unsignedInteger( 'ProductServiceID' );
            $table->integer( 'Quantity' );
            $table->float( 'Price', 8, 2 );
            $table->float( 'Amount', 8, 2 );

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'OrdersProductsServices' );
    }
}
