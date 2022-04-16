<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'quynhnhu',
            'email' => 'quynhnhu908@gmail.com',
            'password' => '12345',
            'phone' => '0123456885',
            'address' => 'Thủ Đức',
        ]);
    }
}
