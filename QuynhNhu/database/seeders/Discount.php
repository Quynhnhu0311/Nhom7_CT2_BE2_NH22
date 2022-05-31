<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Discount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('discount')->insert([
            'id_SP' => 1,
            'date_start' => '2020-04-20',
            'date_end' => '2008-04-30',
        ]);

        \DB::table('discount')->insert([
            'id_SP' => 8,
            'date_start' => '2020-02-10',
            'date_end' => '2008-02-15',
        ]);
    }
}
