<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
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
            'service_id'=>\App\Models\Service::inRandomOrder()->first()->id,
            'offer_price'=>$this->faker->randomFloat(100,50,250),
            'start_date'=>$this->faker->date,
            'due_date'=>$this->faker->date,
            'information'=>$this->faker->text(20),

        ];
    }
}
