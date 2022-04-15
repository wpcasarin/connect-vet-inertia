<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home', ["user" => Auth::user()]);
});
Route::get('/about', function () {
    return Inertia::render('About', ["user" => Auth::user()]);
});

Route::middleware('auth')->group(function () {
    Route::apiResource('pets', PetController::class);
    Route::get('/my-pets', function () {
        return Inertia::render('Pets', ["user" => Auth::user()]);
    });
});

require __DIR__ . '/auth.php';
