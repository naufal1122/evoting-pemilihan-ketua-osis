<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'naufaldewa',
            'role' => 'admin',
            'email' => 'naufaldewa@gmail.com',
            'password' => Hash::make('password'), // Sesuaikan jika ingin password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
