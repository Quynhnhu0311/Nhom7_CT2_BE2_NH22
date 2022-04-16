<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class [PostsTableProducts] extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Iphone13',
            'price' => 23000000,
            'image' => 'iphone13.jpg',
            'discount' => 10,
            'discription' => 'Sang trọng, năng động, mạnh mẽ',
            'type_id' => 1,
            'manu_id' => 2,
        ]);
    }
}
