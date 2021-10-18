<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Ajax\AjaxController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontEnd\FrontendController;
use App\Http\Controllers\User\UserController;
use Faker\Provider\ar_SA\Payment;
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



Route::group(['middleware' => ['auth', 'admin'],], function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});
Route::group(['middleware' => ['auth', 'user'],], function () {
    Route::get('/user', [UserController::class, 'register_second_part'])->name('user');
    Route::post('/register-st-ts', [UserController::class, 'create'])->name('register.next');
    Route::get('/register-fn-to-ts', [UserController::class, 'create_final'])->name('register.final');
});

Route::get('/payment-at-rz-method', [AjaxController::class, 'payment_method'])->name('payment.method');