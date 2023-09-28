<?php

require_once "app/core/Route.php";

Route::add("/", Home::class, "index");
Route::add("/userprofil", UserProfil::class, "index");
Route::add("/detailpost", DetailPost::class, "index");
Route::add("/login", Login::class, "index");
Route::add("/register", Register::class, "index");

Route::run();