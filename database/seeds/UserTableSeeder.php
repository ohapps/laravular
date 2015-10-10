<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test user',
            'email' => 'test@ohapps.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'other user',
            'email' => 'other@ohapps.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
