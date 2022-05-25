<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'weight'=>$this->faker->randomFloat(40,100),
            'Allergic'=>$this->faker->text(20),
            'situation'=>$this->faker->text(20),
            'chronic_diseases'=>$this->faker->text(20),
            'genetic_diseases'=>$this->faker->text(20),
            'surgery'=>$this->faker->text(20),
            'medicine'=>$this->faker->text(20),
            'notes'=>$this->faker->text(30),
            'user_id'=>\App\Models\User::inRandomOrder()->first()->id,
        ];
    }
}
