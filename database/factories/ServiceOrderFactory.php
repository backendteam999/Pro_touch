<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Date'=>$this->faker->date,
            'services_id'=>\App\Models\Service::inRandomOrder()->first()->id,

        ];
    }
}
