<?php

namespace Database\Factories;

use App\Models\GunChallenge;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GunChallengeUser>
 */
class GunChallengeUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gun_challenge_id' => GunChallenge::factory(),
            'user_id' => User::factory(),
            'completed' => $this->faker->boolean(25),
        ];
    }
}
