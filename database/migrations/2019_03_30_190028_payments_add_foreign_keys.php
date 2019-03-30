<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentsAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Payments', function (Blueprint $table) {

            $table->foreign('UserID')->references('ID')->on('Users');
            $table->foreign('OrderID')->references('ID')->on('Orders');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Payments', function (Blueprint $table) {

            $table->dropForeign( 'Payments_UserID_foreign' );
            $table->dropForeign( 'Payments_OrderID_foreign' );

        });
    }
}
