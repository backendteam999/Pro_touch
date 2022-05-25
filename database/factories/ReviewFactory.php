<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
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
            'service_id'=>\App\Models\Service::inRandomOrder()->first()->id,
            'reservation_id'=>\App\Models\Reservation::inRandomOrder()->first()->id,
            'notes'=>$this->faker->text(20),
            'date'=>$this->faker->date,
            'next_view'=>$this->faker->text(20),
        ];
    }
}
