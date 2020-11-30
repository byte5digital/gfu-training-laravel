<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'PHP',
        ]);

        DB::table('tags')->insert([
            'name' => 'Laravel',
        ]);

        DB::table('tags')->insert([
            'name' => 'Tutorial',
        ]);

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'type' => \App\User::ADMIN_TYPE,
        ]);

        factory(App\Article::class, 15)->create();
    }
}
