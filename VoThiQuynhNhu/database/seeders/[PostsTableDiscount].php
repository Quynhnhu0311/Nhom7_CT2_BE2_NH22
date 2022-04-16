<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class [PostsTableDiscount] extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discount')->insert([
            'id_SP' => 1,
            'date_start' => DateTime('2020-04-20 08:37:17', 'UTC'),
            'date_end' => DateTime('2008-04-30 08:37:17', 'UTC'),
        ]);
    }
}
