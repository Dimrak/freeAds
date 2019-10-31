<?php

use Illuminate\Database\Seeder;

class CategTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for ($i = 0; $i < 12; $i++) {
          DB::table('categories')->insert([
             'title' => 'Seeder' . $i . $i,
             'parent_id' => rand(446,448),
             'slug' => 'Seeder' . $i . $i,
          ]);
       }
    }
}
