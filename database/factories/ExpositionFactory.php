<?php

namespace Database\Factories;

use App\Utils\Utils;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exposition>
 */
class ExpositionFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $date_debut = $this->faker->dateTimeBetween('now', '+6 months');
        return [
            'nom' => $this->faker->words(3, true),
            'description' => Utils::html(),
            'date_debut' => $date_debut,
            'date_fin' => $this->faker->dateTimeBetween($date_debut, '+1 year'),
        ];
    }
}
