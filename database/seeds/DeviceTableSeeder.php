<?php

use Illuminate\Database\Seeder;

class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('devices')->insert([
            'name' => 'Mac Book',
            'os' => 'OS X',
            'user_id' => 1,
        ]);

        DB::table('devices')->insert([
            'name' => 'Desktop',
            'os' => 'Windows 8',
            'user_id' => 1,
        ]);

        DB::table('devices')->insert([
            'name' => 'Laptop',
            'os' => 'Windows 10',
            'user_id' => 2,
        ]);
    }
}
