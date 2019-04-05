<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                    'Username'  => 'admin',
                    'Password'  => Hash::make('1234'),
                    'Email'     => 'admin@gmail.com',
                    'Phone'     => '',
                    'Role'      => 1,
                    'FullName'  => 'Main admin'
                ],

                [
                    'Username'  => 'jsnow',
                    'Password'  => Hash::make('1234'),
                    'Email'     => 'jon.snow@gmail.com',
                    'Phone'     => '12345678',
                    'Role'      => 1,
                    'FullName'  => 'Jon Snow'
                ],

                [
                    'Username'  => 'nburcena',
                    'Password'  => Hash::make('nburcena_1234'),
                    'Email'     => 'nikita.burcena@gmail.com',
                    'Phone'     => '29123456',
                    'Role'      => 2,
                    'FullName'  => 'Nikita Burcena'
                ],

                [
                    'Username'  => 'manager1',
                    'Password'  => Hash::make('1234'),
                    'Email'     => 'manager1@gmail.com',
                    'Phone'     => '33557799',
                    'Role'      => 2,
                    'FullName'  => 'First Manager'
                ],

                [
                    'Username'  => 'manager2',
                    'Password'  => Hash::make('1234'),
                    'Email'     => 'manager2@gmail.com',
                    'Phone'     => '44557788',
                    'Role'      => 2,
                    'FullName'  => 'Second Manager'
                ],

                [
                    'Username'  => 'client1',
                    'Password'  => Hash::make('1234'),
                    'Email'     => 'client1@gmail.com',
                    'Phone'     => '',
                    'Role'      => 3,
                    'FullName'  => 'First Client'
                ],

                [
                    'Username'  => 'jwick',
                    'Password'  => Hash::make('1234'),
                    'Email'     => 'john.wick@gmail.com',
                    'Phone'     => '0000000000',
                    'Role'      => 3,
                    'FullName'  => 'John Wick'
                ],  
                [

                    'Username'  => 'sljackson',
                    'Password'  => Hash::make('1234'),
                    'Email'     => 'samysamy123@gmail.com',
                    'Phone'     => '9876543210',
                    'Role'      => 3,
                    'FullName'  => 'Samuel L Jackson'
                ]                            
            ]);
    }
}
