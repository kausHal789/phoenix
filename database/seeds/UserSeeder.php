<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Phoenix',
            'email' => 'admin@test.com',
            'role_id' => 1,
            'email_verified_at' => now(),
            'password' => '$2y$10$R9V2LUblXkSbXKPREQGs7etE7elESIA8/j9P0F8ZhDT2wnUPXwuYW' //12345678
        ]);
    }
}
