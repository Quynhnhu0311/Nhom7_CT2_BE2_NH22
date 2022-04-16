<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class [PostsTableBaoHanh] extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('_bao_hanh')->insert([
            'id_SP' => 1,
            'ngay_BH' => DateTime('2020-04-25 08:37:17', 'UTC'),
            'qty' => 2,
            'amount' => 23000000,
            'status' => 'Chờ xác nhận',
        ]);
    }
}
