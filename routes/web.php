<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/users", function () {
    $users = [
        ["name" => "ram", "email" => "ram@gmail.com", "age" => 3],
        ["name" => "mohan", "email" => "mohan@gmail.com", "age" => 6],
        ["name" => "sohan", "email" => "sohan@gmail.com", "age" => 32],
        ["name" => "sita", "email" => "sita@gmail.com", "age" => 12],
        ["name" => "gita", "email" => "gita@gmail.com", "age" => 26],
        ["name" => "neeta", "email" => "neeta@gmail.com", "age" => 29],
        ["name" => "suresh", "email" => "suresh@gmail.com", "age" => 5],
        ["name" => "mahesh", "email" => "mahesh@gmail.com", "age" => 4],
    ];
    return $users;
});
