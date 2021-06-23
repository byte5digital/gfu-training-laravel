<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('meinPasswort'),
            'remember_token' => Str::random(10),
            'type' => User::ADMIN_TYPE,
        ]);

    }
}
