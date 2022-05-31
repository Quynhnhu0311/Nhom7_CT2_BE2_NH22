<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Manufactures extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('manufactures')->insert([
            'manu_name' => 'Apple',
            'qty' => 8,
        ]);

        \DB::table('manufactures')->insert([
            'manu_name' => 'Samsung',
            'qty' => 11,
        ]);

        \DB::table('manufactures')->insert([
            'manu_name' => 'Asus',
            'qty' => 1,
        ]);

        \DB::table('manufactures')->insert([
            'manu_name' => 'Oppo',
            'qty' => 2,
        ]);

        \DB::table('manufactures')->insert([
            'manu_name' => 'Sony',
            'qty' => 7,
        ]);

        \DB::table('manufactures')->insert([
            'manu_name' => 'Canon',
            'qty' => 3,
        ]);
    }
}
