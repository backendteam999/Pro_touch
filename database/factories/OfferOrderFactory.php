<?php

namespace Database\Factories;
use App\Models\Offer_ordered;


use Illuminate\Database\Eloquent\Factories\Factory;

class OfferOrderFactory extends Factory
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
            'offer_id'=>\App\Models\Offer::inRandomOrder()->first()->id,

        ];
    }
}
