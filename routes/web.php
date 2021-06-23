<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'Medewerkers'])->name('home');

Auth::routes();

Route::get('/personeel', [App\Http\Controllers\PersoneelController::class, 'getUsers'])->name('personeel');

Route::get('/addevent',[App\Http\Controllers\AddEventController::class, 'GetMedewerker'])->name('addevent');

Route::post('/home', [App\Http\Controllers\HomeController::class, 'Inplannen']);
