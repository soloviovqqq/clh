<?php

/** @var Router $router */

use Faker\Factory;
use Illuminate\Support\Str;
use Laravel\Lumen\Routing\Router;

$router->get('options', ['uses' => 'OptionController@getOptions']);

$router->get('reload', function () {
    return response()->json(['reloadProtocol' => config('main.reload_protocol')]);
});


$router->get('generate-user', function () {
    $faker = Factory::create('ru_RU');
    $lastName = $faker->lastName;
    $gender = substr($lastName, -1) === 'a' ? 'female' : 'male';
    $firstName = $faker->firstName($gender);
    $user = [
        'first_name' => Str::ucfirst(Str::slug($firstName)),
        'last_name' => Str::ucfirst(Str::slug($lastName)),
        'gender' => $gender,
        'username' => Str::slug($faker->word . $lastName),
    ];

    return response()->json($user);
});
