<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>\App\Models\User::inRandomOrder()->first()->id,
            'message'=>$this->faker->text(30),
        ];
    }
}
