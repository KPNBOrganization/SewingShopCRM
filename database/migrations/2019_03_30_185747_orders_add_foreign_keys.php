<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           
        Schema::table('Orders', function (Blueprint $table) {

            $table->foreign( 'UserID' )->references( 'ID' )->on( 'Users' );
            $table->foreign( 'ClientID' )->references( 'ID' )->on( 'Users' );
            $table->foreign( 'PointOfSaleID' )->references( 'ID' )->on( 'PointOfSale' );

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Orders', function (Blueprint $table) {
            
            $table->dropForeign( 'Orders_UserID_foreign' );
            $table->dropForeign( 'Orders_ClientID_foreign' );
            $table->dropForeign( 'Orders_PointOfSaleID_foreign' );

        });
    }
}
