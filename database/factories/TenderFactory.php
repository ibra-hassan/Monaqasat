<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tender;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Tender::class, function (Faker $faker) {
    return [
        'name'             => $faker->unique()->name,
        'code'             => Str::random(5),
        'envelope_cost'    => $faker->numberBetween(10000, 999999),
        'amount_warranty'  => $faker->numberBetween(10000, 999999),
        //        'last_date'        => now()->addWeek(),
        //        'open_date'        => now()->addMonth()->addMonth(),
        'ad'               => $faker->realText(191),
        'tender_status_id' => 4,
        'project_id'       => $faker->unique()->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9]),
        'employee_id'      => 1,
        'created_at'       => now(),
    ];
});
