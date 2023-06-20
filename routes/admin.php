<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get("/", function () {
    return redirect()->route("admin.dashboard");
});

Route::get("dashboard", function () {
    return view("admin.dashboard");
})->name("dashboard");
