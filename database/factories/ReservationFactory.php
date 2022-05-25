<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id'=>\App\Models\Patient::inRandomOrder()->first()->id,
            'doctor_id'=>\App\Models\Doctor::inRandomOrder()->first()->id,
            'clinic_id'=>\App\Models\Clinic::inRandomOrder()->first()->id,
            'reception_id'=>\App\Models\Reception::inRandomOrder()->first()->id,
            'event_id'=>\App\Models\Event::inRandomOrder()->first()->id,
            'service_id'=>\App\Models\Service::inRandomOrder()->first()->id,
            'Date'=>$this->faker->date,
            'status'=>$this->faker->boolean,
            'Confirmation'=>$this->faker->boolean,
            'offset'=>$this->faker->numberBetween(1,60),

        ];
    }
}
