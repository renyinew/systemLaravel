<?php

use Illuminate\Database\Seeder;

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
                'id' => 1,
                'name' => 'noecs',
                'avatar' => NULL,
                'email' => 'noecs@qq.com',
                'phone' => '18888888888',
                'amount' => 0.00,
                'password' => '$2y$10$rgdxz6opQxU0LW9qEZ3Jlu8K6GfDUyAhlOE8H0eQxJTZ3gRGw5mPS',
                'level' => 1,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL
            ],
            [
                'id' => 2,
                'name' => 'inoecs',
                'avatar' => NULL,
                'email' => 'inoecs@qq.com',
                'phone' => '18888888889',
                'amount' => 0.00,
                'password' => '$2y$10$rgdxz6opQxU0LW9qEZ3Jlu8K6GfDUyAhlOE8H0eQxJTZ3gRGw5mPS',
                'level' => 1,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL
            ],
        ]);
    }
}
