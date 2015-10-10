<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'description' => 'browsers',
            'user_id' => 1,
        ]);

        DB::table('categories')->insert([
            'description' => 'photo editing',
            'user_id' => 1,
        ]);

        DB::table('categories')->insert([
            'description' => 'developer tools',
            'user_id' => 2,
        ]);

        DB::table('categories')->insert([
            'description' => 'remote access',
            'user_id' => 2,
        ]);
    }
}
