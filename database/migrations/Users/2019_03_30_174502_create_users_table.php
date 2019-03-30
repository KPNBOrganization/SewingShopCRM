<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Users', function (Blueprint $table) {
            
            $table->increments( 'ID' );
            $table->string( 'Username', 30 )->unique();
            $table->string( 'Password', 255 );
            $table->string( 'Email', 30 );
            $table->string( 'Phone', 30 )->nullable();
            $table->integer( 'Role' );
            $table->string( 'FullName', 50 );

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'Users' );
    }
}
