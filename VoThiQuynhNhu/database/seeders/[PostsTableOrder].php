<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class [PostsTableOrder] extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->insert([
            'id_cart' => 1,
            'id_user' => 1,
            'id_detail_cart' => 1,
            'status' => 'Chờ xác nhận',
            'amount' => 23000000,
            'date_order' => DateTime('2020-04-25 08:37:17', 'UTC'),
        ]);
    }
}
