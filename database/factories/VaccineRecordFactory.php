<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VaccineRecord>
 */
class VaccineRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'vet_id' => rand(1, 10),
            'pet_id' => rand(1, 45),
            'name' => $this->faker->company(),
            'next_dose' => $this->faker->dateTimeBetween('now', '1 year')
        ];
    }
}
