<?php

use Illuminate\Database\Seeder;

class ApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([
            'name' => 'Chrome',
            'portable' => 1,
            'category_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('applications')->insert([
            'name' => 'Internet Explorer',
            'portable' => 0,
            'category_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('applications')->insert([
            'name' => 'Gimp',
            'portable' => 1,
            'category_id' => 2,
            'user_id' => 1,
        ]);

        DB::table('applications')->insert([
            'name' => 'Atom',
            'portable' => 1,
            'category_id' => 3,
            'user_id' => 2,
        ]);

        DB::table('applications')->insert([
            'name' => 'Team Viewer',
            'portable' => 1,
            'category_id' => 4,
            'user_id' => 2,
        ]);
    }
}
