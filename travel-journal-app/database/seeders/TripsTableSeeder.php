<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;
use Faker\Generator as Faker;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 10; $i++) {
            $newTrip = new Trip();

            $newTrip->destination = $faker->city();
            $newTrip->start_date = $faker->date();
            $newTrip->end_date = $faker->date();
            $newTrip->notes = $faker->paragraph();

            $newTrip->save();
        }
    }
}
