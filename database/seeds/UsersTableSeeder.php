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
            'firstName' => "hello",
            'lastName' => "thorn",
            'email' => "admidn@gmail.com",
            'position' => "Web Trainer",
            'password' => Hash::make('12345678'),
            'role_id' => 1,

        ]);
        DB::table('users')->insert([
            'firstName' => "helooo",
            'lastName' => "chhorn",
            'email' => "normdal@gmail.com",
            'position' => "SNA Trainer",
            'password' => Hash::make('12345678'),
            'role_id' => 2,

        ]);
    }
}
