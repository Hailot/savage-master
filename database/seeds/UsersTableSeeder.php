<?php

use App\User;
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
        $user1 = User::create([
            'name' => 'Hailot',
            'email' => 'mightylordfe@gmail.com',
            'password' => bcrypt('sehrgutes'),
            'email_verified_at' => Carbon::now(),
        ]);
        $user1->assignRole('admin');
        $user2 = User::create([
            'name' => 'Test Moderator',
            'email' => 'test@test.com',
            'password' => bcrypt('1234test'),
            'email_verified_at' => Carbon::now(),
        ]);
        $user2->assignRole('moderator');
        $user3 = User::create([
            'name' => 'Test User',
            'email' => 'test2@test.com',
            'password' => bcrypt('1234test'),

        ]);
        $user3->assignRole('standard');
    }
}
