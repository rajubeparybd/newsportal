<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('frontend.home');
});

Route::group(["middleware" => ["auth", "verified"], "as" => "user.", "prefix" => "user"], function () {
    Route::get("/", function () {
        return redirect()->route("user.dashboard");
    });

    Route::get("/dashboard", function () {
        return view("user.dashboard");
    })->name("dashboard");

//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
