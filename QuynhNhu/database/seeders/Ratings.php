<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Ratings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('ratings')->insert([
            'product_id' => '2',
            'rating' => 3,
        ]);
        \DB::table('ratings')->insert([
            'product_id' => '5',
            'rating' => 2,
        ]);
    }
}
