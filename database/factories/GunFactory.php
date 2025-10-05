<?php

namespace Database\Factories;

use App\Models\Gun;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gun>
 */
class GunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Assault Rifle', 'SMG', 'LMG', 'Sniper', 'Marksman', 'Shotgun', 'Pistol', 'Launcher', 'Melee'
        ];

        return [
            'name' => ucfirst($this->faker->unique()->words(2, true)),
            'category' => $this->faker->randomElement($categories),
            'description' => $this->faker->sentence(10),
            'released_in' => (string) $this->faker->randomElement(['MW', 'BO', 'Vanguard', 'MWII', 'MWIII', 'BOCW']),
        ];
    }
}
