<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Attach a few posts to random users
        User::query()->inRandomOrder()->take(10)->get()->each(function (User $user) {
            Post::factory()->count(fake()->numberBetween(1, 4))->state([
                'user_id' => $user->id,
            ])->create();
        });
    }
}
