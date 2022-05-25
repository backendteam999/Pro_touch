<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
         \App\Models\Clinic::factory(5)->create();
         \App\Models\Device::factory(5)->create();
         \App\Models\Doctor::factory(15)->create();
         \App\Models\Event::factory(15)->create();
         \App\Models\Medical_log::factory(15)->create();
         \App\Models\ML_Dental_Clinic::factory(15)->create();
         \App\Models\ML_Nutrition_Clinic::factory(15)->create();
         \App\Models\Notification::factory(15)->create();
         \App\Models\Offer::factory(5)->create();
         \App\Models\Offer_ordered::factory(5)->create();
         \App\Models\Patient::factory(15)->create();
         \App\Models\Reception::factory(2)->create();
         \App\Models\Reservation::factory(15)->create();
         \App\Models\Review::factory(15)->create();
         \App\Models\Service::factory(5)->create();
         \App\Models\Services_ordered::factory(5)->create();


    }
}
