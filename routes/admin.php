<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\User\PermissionController;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get("/", function () {
    return redirect()->route("admin.dashboard");
})->name("index");
Route::prefix("user-manager")->as("user.manager.")->group(function () {
    Route::resources([
        "permissions" => PermissionController::class,
        "roles" => RoleController::class,
        "users" => UserController::class
    ]);
});

Route::get("dashboard", [AdminController::class, "dashboard"])->name("dashboard");
Route::get("theme", [AdminController::class, "changeTheme"])->name("changeTheme");  
