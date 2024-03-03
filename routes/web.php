<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/', [UserController::class, 'index'])->name('user.home');
Route::get('/contact', [UserController::class, 'contact'])->name('user.contact');

Route::group(['middleware' => ['is_login']], function () {

    Route::get('/register', [UserController::class, 'register'])->name('user.register');

    Route::post('/user-registered', [UserController::class, 'registered'])->name('registered');

    Route::get('/login', [UserController::class, 'login'])->name('user.login');

    Route::post('/login', [UserController::class, 'userlogin'])->name('login');


    Route::get('/referral-register', [UserController::class, 'loadReferralRegister'])->name('referral-registered');
    Route::get('/email-verification/{token}', [UserController::class, 'emailverification'])->name('emailverification');

});

Route::group(['middleware' => ['is_logout']], function () {

    //Admin

    Route::get('/admin', [UserController::class, 'admin'])->name('admin');
    Route::get('/adminusers', [UserController::class, 'adminusers'])->name('adminusers');
    Route::get('/adminpayments', [UserController::class, 'adminpayments'])->name('adminpayments');
    Route::get('/adminnetworks', [UserController::class, 'adminnetworks'])->name('adminnetworks');


    //Users


    Route::get('/payment', [UserController::class, 'payment'])->name('payment');
    Route::get('/success', [UserController::class, 'success'])->name('success');
    Route::get('/failed', [UserController::class, 'failed'])->name('failed');

    Route::post('/razorpay', [UserController::class, 'razorpay'])->name('razorpay');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/referrals', [UserController::class, 'referrals'])->name('referrals');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    Route::get('/profile_update', [UserController::class, 'profile_update'])->name('profile_update');

    Route::post('/profile/{user}', [UserController::class, 'update'])->name('profile.update');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');


    Route::get('/delete-account', [UserController::class, 'deleteAccount'])->name('deleteAccount');

});