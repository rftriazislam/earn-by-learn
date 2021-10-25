<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AffiliateController;
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
Route::get('/logout-logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/learn-ria-earn-{id}-world-by-{sa}', [AffiliateController::class, 'referral_link']);



Route::group(['middleware' => ['auth', 'admin'],], function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/notification/student', [AdminController::class, 'rafa_payment'])->name('rafa.payment');
    Route::get('/notification/student-confirm/{id}', [AdminController::class, 'rafa_confirm'])->name('rafa.confirm');
    Route::get('/notification/student-reject/{id}', [AdminController::class, 'rafa_reject'])->name('rafa.reject');

    Route::get('/currency-convert-upload', [AdminController::class, 'currency_convert_upload'])->name('moneyexchange');
    Route::get('/payment/payment-method', [AdminController::class, 'payment_method'])->name('payment_method');
    Route::post('/payment/save-method', [AdminController::class, 'save_method'])->name('save_method');

    Route::get('/course/add-course', [AdminController::class, 'add_course'])->name('add_course');
});
Route::group(['middleware' => ['auth', 'user'],], function () {
    Route::get('/user', [UserController::class, 'register_second_part'])->name('user');
    Route::post('/register-st-ts', [UserController::class, 'create'])->name('register.next');
    Route::get('/register-fn-to-ts', [UserController::class, 'create_final'])->name('register.final');
    Route::post('/register-st-ts-complete', [UserController::class, 'register_final_create'])->name('register.final.create');
    Route::get('/register-fn-ch-to-ps-recapture', [UserController::class, 'register_final_check'])->name('register.final.check');
    Route::post('/register-st-ts-update', [UserController::class, 'register_final_update'])->name('register.final.update');
    Route::get('/user/dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');
    Route::get('/register-profile-update', [UserController::class, 'register_profile_update'])->name('register.profile.update');
    Route::post('/register-save-update', [UserController::class, 'register_save_update'])->name('register.save.update');

    Route::get('/notification/parent', [UserController::class, 'parent_payment'])->name('parent.payment');
    Route::get('/notification/parent-confirm/{id}', [UserController::class, 'parent_confirm'])->name('parent.confirm');
    Route::get('/notification/parent-reject/{id}', [UserController::class, 'parent_reject'])->name('parent.reject');
    Route::get('/notification/child', [UserController::class, 'child_payment'])->name('child.payment');
    Route::get('/notification/child-confirm/{id}', [UserController::class, 'child_confirm'])->name('child.confirm');
    Route::get('/notification/child-reject/{id}', [UserController::class, 'child_reject'])->name('child.reject');
    Route::get('/affiliate-link', [UserController::class, 'affiliate_link'])->name('affiliate-link');
});


Route::get('/payment-at-rz-method', [AjaxController::class, 'payment_method'])->name('payment.method');

Route::get('/check-referral', [AjaxController::class, 'referral'])->name('check.referral');