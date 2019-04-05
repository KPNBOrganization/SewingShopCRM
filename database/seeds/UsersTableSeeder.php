<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'Users' )
            ->insert([
                [
                    'Username'  => '',
                    'Password'  => '',
                    'Email'     => '',
                    'Phone'     => '',
                    'Role'      => 1,
                    'FullName'  => 'DICK'
                ]
            ]);
    }
}
