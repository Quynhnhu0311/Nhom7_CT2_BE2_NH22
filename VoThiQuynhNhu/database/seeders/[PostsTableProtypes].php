<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class [PostsTableProtypes] extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('protypes')->insert([
            'type_name' => 'SmartPhone',
            'qty' => 7,
        ]);
    }
}
