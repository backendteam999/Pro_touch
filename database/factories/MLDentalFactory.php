<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MLDentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'smoking'=>$this->faker->boolean,
            'Oral_Allergic'=>$this->faker->text(20),
            'medical_log_id'=>\App\Models\Medical_log::inRandomOrder()->first()->id,

        ];
    }
}
