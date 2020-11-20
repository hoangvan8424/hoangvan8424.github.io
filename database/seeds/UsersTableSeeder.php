<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Hoàng Văn Thái',
                'email' => 'hoangvan181198@gmail.com',
                'password' => Hash::make(12345678),
                'role'  => 1,
            ],
            [
                'name' => 'Hoàng',
                'email' => 'bienbang2017@gmail.com',
                'password' => Hash::make(12345678),
                'role'  => 1,
            ],
        ]);
    }
}
