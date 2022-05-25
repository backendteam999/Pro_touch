<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReeceptionFactory extends Factory
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
            'age'=>$this->faker->numberBetween(30,50),
            'gender'=>$this->faker->randomElement('male','female'),
            'skills'=>$this->faker->text(20),
            'user_id'=>\App\Models\User::inRandomOrder()->first()->id,

        ];
    }
}
