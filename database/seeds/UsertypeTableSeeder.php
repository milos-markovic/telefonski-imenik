<?php

use Illuminate\Database\Seeder;

class UsertypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usertype')->insert([
            'name' => 'admin',
        ]);
        DB::table('usertype')->insert([
            'name' => 'user',
        ]);
    }
}
