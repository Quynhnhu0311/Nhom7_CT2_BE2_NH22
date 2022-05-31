<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Protypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('protypes')->insert([
            'type_name' => 'SmartPhone',
            'qty' => 7,
        ]);

        \DB::table('protypes')->insert([
            'type_name' => 'Laptop',
            'qty' => 5,
        ]);

        \DB::table('protypes')->insert([
            'type_name' => 'Headphone',
            'qty' => 5,
        ]);

        \DB::table('protypes')->insert([
            'type_name' => 'Watch',
            'qty' => 5,
        ]);

        \DB::table('protypes')->insert([
            'type_name' => 'MegaPhone',
            'qty' => 5,
        ]);

        \DB::table('protypes')->insert([
            'type_name' => 'Camera',
            'qty' => 5,
        ]);
    }
}
