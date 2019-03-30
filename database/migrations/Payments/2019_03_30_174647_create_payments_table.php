<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Payments', function (Blueprint $table) {
            
            $table->increments('ID');
            $table->dateTime('Date');
            $table->float('Amount',8,2);
            $table->integer('UserID');
            $table->integer('OrderID');
            $table->foreign('UserID')->references('ID')->on('Users');
            $table->foreign('OrderID')->references('ID')->on('Users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'Payments' );
    }
}
