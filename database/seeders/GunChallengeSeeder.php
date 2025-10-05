<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gun;
use App\Models\GunChallenge;

class GunChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // For each existing gun, create several challenges
        Gun::query()->each(function (Gun $gun) {
            GunChallenge::factory()
                ->count(fake()->numberBetween(3, 8))
                ->state(['gun_id' => $gun->id])
                ->create();
        });
    }
}
