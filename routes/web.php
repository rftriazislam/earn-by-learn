<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontEnd\FrontendController;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [FrontendController::class, 'index']);
Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::post('/login', [LoginController::class, 'login']);