<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;
use Faker\Generator as Faker;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $ratings = ['pessimo', 'scarso', 'accettabile', 'buono', 'ottimo'];

        foreach ($ratings as $rating) {
            $newRating = new Rating();

            $newRating->rating = $rating;
            $newRating->review = $faker->sentence();
            
            $newRating->save();
        }
    }
}
