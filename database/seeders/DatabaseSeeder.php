<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::firstOrNew([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password'  =>  \Illuminate\Support\Facades\Hash::make('admin12345'),  //admin12345
        ]);

        \App\Models\User::factory(10)->create();

        \App\Models\Category::factory(10)->create();

        \App\Models\Subscriber::factory(10)->create();

        \App\Models\Post::factory(10)->create();

        \App\Models\Contact::factory(10)->create();

        \App\Models\Comment::factory(10)->create();
    }
}
