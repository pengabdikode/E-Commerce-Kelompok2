<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'first_name' => 'first_user',
            'last_name' => 'last_user',
            'email' => 'user@gmail.com',
            'address' => 'jl.user kp.cerewet',
            'city' => 'city user',
            'postal_code' => '17112',
            'telephone_number' => '087667',
            'name' => 'root',
            'email' => 'root@gmail.com',
            'admin' => 1,
            'password' => bcrypt('rootpassword'),
            'member' => 'admin',
        ]);

       DB::table('users')->insert([
            'first_name' => 'first_user',
            'last_name' => 'last_user',
            'email' => 'user@gmail.com',
            'address' => 'jl.user kp.cerewet',
            'city' => 'city user',
            'postal_code' => '17111',
            'telephone_number' => '087657',
            'name' => 'user',
            'email' => 'user@gmail.com',
            'admin' => 0,
            'password' => bcrypt('userpassword'),
            'member' => 'normal',
        ]);
    }
}
