<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GunChallenge;
use App\Models\GunChallengeUser;
use App\Models\User;

class GunChallengeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        GunChallenge::query()->inRandomOrder()->take(50)->get()->each(function (GunChallenge $challenge) use ($users) {
            $participants = $users->random(min(5, max(1, (int) floor($users->count() * 0.3))))->pluck('id');
            foreach ($participants as $userId) {
                GunChallengeUser::factory()->state([
                    'gun_challenge_id' => $challenge->id,
                    'user_id' => $userId,
                ])->create();
            }
        });
    }
}
