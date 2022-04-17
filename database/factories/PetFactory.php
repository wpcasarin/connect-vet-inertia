<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pets>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $species = ['DOG', 'CAT'];
        $sex = ['F', 'M'];
        $birth = $this->faker->dateTimeThisDecade();
        $age = Carbon::parse($birth)->diff(Carbon::now())->y;
        return [
            'name' => $this->faker->firstName(),
            'specie' => $species[rand(0, 1)],
            'sex' => $sex[rand(0, 1)],
            'date_of_birth' => Carbon::parse($birth)->toDateString()
        ];
    }
}
