<?php

use App\Http\Controllers\Web\JokeController;
use App\Http\Controllers\Web\LoginController;
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

Route::middleware('auth')->get("/",[JokeController::class, "index"]);

Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::middleware('auth')->post('/logout', [LoginController::class, 'logout'])->name('logout');


