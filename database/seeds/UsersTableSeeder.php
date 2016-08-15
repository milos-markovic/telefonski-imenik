<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstName' => 'Milos',
            'lastName' => 'Markovic',
            'email' => 'milos@gmail.com',
            'password' => bcrypt(1),
            'created_at' => Carbon\Carbon::now(),
            'usertype_id' => 1
        ]);
        DB::table('users')->insert([
            'firstName' => 'Djordje',
            'lastName' => 'Markovic',
            'email' => 'djordje.markovic.djolex@gmail.com',
            'password' => bcrypt(1),
            'created_at' => Carbon\Carbon::now(),
            'usertype_id' => 2
        ]);
    }
}
