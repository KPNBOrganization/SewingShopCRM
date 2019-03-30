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
        Schema::table('Orders', function (Blueprint $table) {
            
            $table->increments( 'ID' );
            $table->dateTime( 'Date' );
            $table->float( 'Amount', 8, 2 );
            $table->integer( 'UserID' );
            $table->integer( 'ClientID' );
            $table->integer( 'PointOfSaleID' );

            $table->foreign( 'UserID' )->reference( 'ID' )->on( 'Users' );
            $table->foreign( 'ClientID' )->reference( 'ID' )->on( 'Users' );
            $table->foreign( 'PointOfSaleID' )->reference( 'ID' )->on( 'PointOdSale' );

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
