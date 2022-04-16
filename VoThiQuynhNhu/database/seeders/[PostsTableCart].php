<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class [PostsTableCart] extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart')->insert([
            'id_SP' => 1,
            'qty' => 2,
        ]);
    }
}
