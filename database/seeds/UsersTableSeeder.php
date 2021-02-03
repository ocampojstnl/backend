<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Db;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['name' => 'Justin Al', 'email' => 'boss@tino.org','email_verified_at' => '', 'remember_token' => csrf_token(), 'password' => password_hash('justinal123', PASSWORD_DEFAULT), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'admin', 'email' => 'admin@admin.com','email_verified_at' => '', 'remember_token' => csrf_token(), 'password' => password_hash('admin123', PASSWORD_DEFAULT), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
