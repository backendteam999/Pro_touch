<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->text(10),
            'age'=>$this->faker->numberBetween(12,100),
            'gender'=>$this->faker->randomElement('male','female'),
            'user_id'=>\App\Models\User::inRandomOrder()->first()->id,

        ];
    }
}
