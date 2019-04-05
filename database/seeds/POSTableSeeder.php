<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class POSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'PointOfSale' )
            ->insert([

                [
                    'Name'  => 'Main store',
                    'Address'  => 'Sweet Street 7'
                ],

                [
                    'Name'  => 'Small store',
                    'Address'  => 'Poor Street 3'
                ],

                [
                    'Name'  => 'Medium store',
                    'Address'  => 'Clever Street 0'
                ],

                [
                    'Name'  => 'phone',
                    'Address'  => ''
                ]
                         
            ]);
    }
}
