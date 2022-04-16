<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class [PostsTableManufactures] extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufactures')->insert([
            'manu_name' => 'Apple',
            'qty' => 8,
        ]);
    }
}
