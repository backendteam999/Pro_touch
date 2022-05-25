<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_id' => \App\Models\Service::inRandomOrder()->first()->id,
            'name'=>$this->faker->text(10),
            'description'=>$this->faker->text(30),
        ];
    }
}
