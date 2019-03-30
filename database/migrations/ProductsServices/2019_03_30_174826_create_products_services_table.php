<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ProductsServices', function (Blueprint $table) {
            
            $table->increments('ID');
            $table->string('Article',30);
            $table->string('Name',30);
            $table->string('Description',255);
            $table->float('Price',8,2);
            $table->integer('Quantity');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'ProductsServices' );
    }
}
