<?php

namespace Database\Factories;

use App\Models\Gun;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GunChallenge>
 */
class GunChallengeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $camoCategories = ['Gold', 'Platinum', 'Polyatomic', 'Orion', 'Completionist', 'Woodland', 'Dragon'];
        $modes = ['multiplayer', 'zombies', 'warzone'];

        return [
            'challenge' => $this->faker->sentence(6),
            'camo_name' => ucfirst($this->faker->unique()->word()),
            'came_category' => $this->faker->randomElement($camoCategories),
            'mode' => $this->faker->randomElement($modes),
            'gun_id' => Gun::factory(),
        ];
    }
}
