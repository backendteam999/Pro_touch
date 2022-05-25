<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MLNutritionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'food allergy'=>$this->faker->text(20),
            'job'=>$this->faker->text(20),
            'length'=>$this->faker->numberBetween(100,250),
            'age'=>$this->faker->numberBetween(13,100),
            'sport schedule'=>$this->faker->text(20),
            'medical_log_id'=>\App\Models\Medical_log::inRandomOrder()->first()->id,
        ];
    }
}
