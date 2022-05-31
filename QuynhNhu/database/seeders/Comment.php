<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Comment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('detail_order')->insert([
            'comment' => 'Good',
            'comment_name' => 'Quỳnh Như',
            'comment_date' => '03/11/2001',
            'comment_product_id' => '2',
        ]);
    }
}
