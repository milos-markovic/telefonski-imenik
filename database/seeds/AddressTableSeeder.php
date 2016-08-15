<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->insert([
            'firstName' => 'Branka',
            'lastName' => 'Josimovic',
            'street' => 'Miše Dimitrijevića 67',
            'city' => 'Novi sad',
            'areaCode' => '021',
            'phoneNumber' => '6343-132',
            'email' => 'branka@gmail.com',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
            'user_id' => 1
        ]);
        DB::table('address')->insert([
            'firstName' => 'Djordje',
            'lastName' => 'Markovic',
            'street' => 'Kneza Miloša',
            'city' => 'Šid',
            'areaCode' => '063',
            'phoneNumber' => '754-3279',
            'email' => 'djordje@gmail.com',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
            'user_id' => 1
        ]);
    }
}
