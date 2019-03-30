<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointOfSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PointOfSale', function (Blueprint $table) {
            
            $table->increments( 'ID' );
            $table->string( 'Name', 30 );
            $table->string( 'Address', 50 )->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop( 'PointOfSale' );
    }
}
