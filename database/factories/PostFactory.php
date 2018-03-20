<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word, 
        'body' => $faker->sentences(3,true),
        'user_id' => function() {
           return  factory('App\User')->create()->id; 
        }, 
    ];
});
