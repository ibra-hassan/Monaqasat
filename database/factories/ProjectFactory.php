<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name'           => $faker->unique()->name,
        'cost_primary'   => $faker->numberBetween(10000, 999999),
        'estimated_year' => $faker->randomElement([1, 2, 3, 4, 5]),
        'target_number'  => $faker->numberBetween(10000, 999999),
        'type_id'        => $faker->randomElement(\App\Models\ProjectType::all()->pluck('id')->toArray()),
        'nature_id'      => $faker->randomElement(\App\Models\ProjectNature::all()->pluck('id')->toArray()),
        'directorate_id' => $faker->randomElement(\App\Models\Directorate::all()->pluck('id')->toArray()),
        //        'start_date'     => now()->addMonth()->format('Y-m-d H:i:s'),
        'created_at'     => now(),
    ];
});
