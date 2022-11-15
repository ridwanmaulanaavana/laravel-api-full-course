<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CommentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
