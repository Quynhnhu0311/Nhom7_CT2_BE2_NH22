<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BaoHanh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('_bao_hanh')->insert([
            'id_SP' => 1,
            'ngay_BH' => '2020-04-25',
            'status' => 'Chờ xác nhận',
        ]);
    }
}
