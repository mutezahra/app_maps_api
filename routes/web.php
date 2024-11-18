<?php

use App\Http\Controllers\LogC;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function () {
    return view('auth.login');
});


// Auth::routes();


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register_action', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('guest');
Route::post('/login_action', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('auth');



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/calculate-route', [RouteController::class, 'calculateRoute'])->name('calculate.route');
Route::get('/location-suggestions', [RouteController::class, 'getLocationSuggestions'])->name('location.suggestions');
Route::get('/log', [LogC::class, 'index'])->name('log');
