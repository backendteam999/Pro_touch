<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clinic_id'=>\App\Models\Clinic::inRandomOrder()->first()->id,
            'price'=>$this->faker->numberBetween(75,375),
            'description'=>$this->faker->text(20),
            ];
    }
}
