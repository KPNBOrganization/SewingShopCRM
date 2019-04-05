<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
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
                    'Article'  => '21342FFKGC',
                    'Name'  => 'Silk',
                    'Description'  => 'A fine continuous protein fiber produced by various insect larvae usually for cocoons',
                    'Price'  => '5.99',
                    'Quantity'  => '5000'

                ],

                [
                    'Article'  => '12345ABCDE',
                    'Name'  => 'Cotton',
                    'Description'  => 'A soft, fluffy staple fiber that grows in a boll, or protective case, around the seeds of the cotton plants of the genus Gossypium in the mallow family Malvaceae',
                    'Price'  => '3.99',
                    'Quantity'  => '2000'
                ],

                [
                    'Article'  => '98765ZYXWV',
                    'Name'  => 'Linum',
                    'Description'  => ' The type genus of Linaceae comprising herbaceous annual or perennial plants that have small sessile leaves',
                    'Price'  => '4.00',
                    'Quantity'  => '3000'
                ],

                [
                    'Article'  => '54421AABAB',
                    'Name'  => 'Giogio Armani fabric',
                    'Description'  => 'One roll = 15 meters',
                    'Price'  => '15.00',
                    'Quantity'  => '10000'
                ],

                [
                    'Article'  => 'ABCDE54321',
                    'Name'  => 'Fixing jacket',
                    'Description'  => 'Fixing any damage done to jacket',
                    'Price'  => '39.99',
                    'Quantity'  => '1'
                ],

                [
                    'Article'  => 'ABCDE54321',
                    'Name'  => 'Kniting sweater ',
                    'Description'  => 'This sweater will keep you warm',
                    'Price'  => '49.99',
                    'Quantity'  => '1'
                ]

                         
            ]);
    }
}
