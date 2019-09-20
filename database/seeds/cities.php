<?php

use Illuminate\Database\Seeder;

class cities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' => Str::random(10),
        ]);
    }
}
