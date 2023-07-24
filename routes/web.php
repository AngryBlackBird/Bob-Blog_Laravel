<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix("/")->name("auth.")->group(function () {
    Route::get("/login", [AuthController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "doLogin"]);
    Route::delete("/logout", [AuthController::class, "logout"])->name("logout");

    Route::get("/subscribe", [AuthController::class, "subscribe"])->name("subscribe");
    Route::post("/subscribe", [AuthController::class, "doSubcribe"]);

});


Route::get('/', function () {
    $posts = \App\Models\Post::offset(0)->limit(3)->get();

    return view("welcome", ["posts" => $posts]);
})->name("home");


Route::prefix("/blog")->name("blog.")->group(function () {
    Route::get('/', [BlogController::class, "index"])
        ->name('index');

    Route::get('/{slug}-{post}', [BlogController::class, "show"])
        ->name('show')
        ->where(["post" => "[0-9]+", "slug" => "[a-z0-9\-]+"]);

    Route::prefix("/new")->name("create")->middleware("auth")->group(function () {
        Route::get('/', [BlogController::class, "create"]);
        Route::post('/', [BlogController::class, "save"]);
    });

    Route::prefix("/edit")->name("edit")->middleware("auth")->group(function () {
        Route::get("/{slug}-{post}", [BlogController::class, "edit"])->where(["post" => "[0-9]+", "slug" => "[a-z0-9\-]+"]);
        Route::post("/{slug}-{post}", [BlogController::class, "update"])->where(["post" => "[0-9]+", "slug" => "[a-z0-9\-]+"]);
    });
});
