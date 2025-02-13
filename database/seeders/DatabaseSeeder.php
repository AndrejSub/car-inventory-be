<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Part;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        $cars = Car::factory(3)->create();

//        Part::factory(10)->make()->each(function ($part) use ($cars) {
//            $part->car_id = $cars->random()->id;
//            $part->save();
//        });

        Car::factory(3)->has(Part::factory(4))->create();
    }
}
