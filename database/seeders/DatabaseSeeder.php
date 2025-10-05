<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Core users
        User::factory(25)->create();

        // Domain data
        $this->call([
            GunSeeder::class,
            GunChallengeSeeder::class,
            PostSeeder::class,
            FriendSeeder::class,
            GunChallengeUserSeeder::class,
        ]);
    }
}
