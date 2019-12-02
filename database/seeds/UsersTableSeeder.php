<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
            'name' => 'Hailot',
            'email' => 'mightylordfe@gmail.com',
            'password' => bcrypt('sehrgutes'),
            'email_verified_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => bcrypt('1234test'),
            'email_verified_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Test User2',
            'email' => 'test2@test.com',
            'password' => bcrypt('1234test'),

        ]);
    }
}
