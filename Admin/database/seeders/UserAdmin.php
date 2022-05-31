<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_admin')->insert([
            'username' => 'quynhnhu',
            'email' => 'quynhnhu0311@gmail.com',
            'password' => '123',
        ]);
    }
}
