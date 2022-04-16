<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class [PostsTableDetailOrder] extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_order')->insert([
            'id_Order' => 1,
            'id_SP' => 1,
            'qty' => 2,
            'amount' => 23000000,
            'status' => 'Chờ xác nhận',
            'id_BH' => 1,
        ]);
    }
}
