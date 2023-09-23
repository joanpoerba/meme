<?php

require_once "app/core/Route.php";

Route::add("/", Home::class, "index");
Route::add("/login", Login::class, "index");
Route::add("/register", Register::class, "index");

Route::run();