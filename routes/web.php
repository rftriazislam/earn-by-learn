<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\Ajax\AjaxController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontEnd\FrontendController;
use App\Http\Controllers\PaypalController;
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
    Route::get('/method/{id}', [AdminController::class, 'method_edit'])->name('method.edit');

    Route::post('/payment/update-method', [AdminController::class, 'update_method'])->name('update_method');

    Route::get('/course/add-course', [AdminController::class, 'add_course'])->name('add_course');
    Route::post('/course/save-course', [AdminController::class, 'save_course'])->name('save.course');


    Route::get('/course/delete-course/{id}', [AdminController::class, 'delete_course'])->name('course.delete');

    Route::get('email-marketing', [AdminController::class, 'email_marketing'])->name('admin.email');

    Route::get('accept-email-marketing', [AdminController::class, 'accept_email_marketing']);
    Route::get('reject-email-marketing', [AdminController::class, 'reject_email_marketing']);

    Route::get('accept-email/{id}', [AdminController::class, 'accept_email'])->name('accept_email');
    Route::get('reject-email/{id}', [AdminController::class, 'reject_email'])->name('reject_email');

    Route::get('gift-card', [AdminController::class, 'giftcard'])->name('admin.giftcard');
    Route::post('gift-card-save', [AdminController::class, 'card_save'])->name('card.save');
});
Route::group(['middleware' => ['auth', 'user'],], function () {
    Route::get('/user', [UserController::class, 'register_second_part'])->name('user');
    Route::post('/register-st-ts', [UserController::class, 'create'])->name('register.next');
    Route::get('/register-fn-to-ts', [UserController::class, 'create_final'])->name('register.final');

    Route::post('/register-st-ts-complete', [UserController::class, 'register_final_create'])->name('register.final.create');

    Route::post('/register-save-update-complete', [UserController::class, 'register_final_update_create'])->name('register.final.update.create');


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

    Route::get('/course/user-course', [UserController::class, 'user_course'])->name('user.course');
    Route::get('/course/user-course-{view}', [UserController::class, 'course_single_view'])->name('course.single.view');
    Route::get('/course/course-{id}', [UserController::class, 'course_play'])->name('course.play');

    Route::get('/payment/method-add', [UserController::class, 'payment_method_add'])->name('payment.method.add');


    Route::post('/payment/save-payment-method', [UserController::class, 'save_payment_method'])->name('save.payment.method');
    Route::get('/payment/delete-{id}', [UserController::class, 'payment_method_delete'])->name('payment.method.delete');
    Route::get('/payment/status-{id}', [UserController::class, 'payment_method_status'])->name('payment.method.status');

    Route::get('/profile/view', [UserController::class, 'profile_view'])->name('profile.view');
    Route::post('/profile-save-update', [UserController::class, 'user_profile_update'])->name('user.profile.update');



    Route::get('/email/add', [UserController::class, 'email_marketing'])->name('email_marketing');
    Route::post('/email/save', [UserController::class, 'save_email'])->name('save_email');
    Route::get('user/default', [UserController::class, 'default'])->name('default');

    Route::get('/mentor/first-mentor', [UserController::class, 'parent_mentor'])->name('parent.mentor');
    Route::get('/mentor/second-mentor', [UserController::class, 'child_mentor'])->name('child.mentor');

    Route::get('payment/giftcard', [UserController::class, 'payment_giftcard'])->name('giftcard');
    Route::post('payment/save/giftcard', [UserController::class, 'register_final_create'])->name('payment.giftcard');
});


Route::get('payment/page', [UserController::class, 'payment_page'])->name('paywithpaypal');
Route::post('payment/payment', [PaypalController::class, 'paypal_payment'])->name('paypal');
Route::post('paypal', [PaypalController::class, 'getPaymentStatus'])->name('status');






Route::get('/payment-at-rz-method', [AjaxController::class, 'payment_method'])->name('payment.method');
Route::get('/check-referral', [AjaxController::class, 'referral'])->name('check.referral');


// Route::any('{slug}', function () {

//     return view('frontend.error.error');
// });