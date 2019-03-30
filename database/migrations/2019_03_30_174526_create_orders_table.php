<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('Orders', function (Blueprint $table) {
            
            $table->increments( 'ID' );
            $table->dateTime( 'Date' );
            $table->float( 'Amount', 8, 2 );
            $table->unsignedInteger( 'UserID' );
            $table->unsignedInteger( 'ClientID' );
            $table->unsignedInteger( 'PointOfSaleID' );

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'Orders' );
    }
}
