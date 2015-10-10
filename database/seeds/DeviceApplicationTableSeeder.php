<?php

use Illuminate\Database\Seeder;

class DeviceApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('device_applications')->insert([
            'application_id' => 1,
            'device_id' => 2,
        ]);

        DB::table('device_applications')->insert([
            'application_id' => 4,
            'device_id' => 3,
        ]);
    }
}
