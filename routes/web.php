<?php

use App\Http\Controllers\BilliardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'security'], function(){
    // Go to history
    Route::get('/history', [UserController::class, 'showHistoryPage']);
    // Go to History detail
    Route::get('/historyDetail/{id}', [UserController::class, 'showhistorydetailPage']);
    // Billiard Detail
    Route::get('/billiardDetail/{id}', [BilliardController::class, 'showBilliardDetail']);
    // Booking Billiard
    Route::get('/bookingBilliard/{id}', [BilliardController::class, 'showBookingBilliard']);
    // Go Profile Page
    Route::get('/profile', [UserController::class, 'showProfilePage']);
    // Update user
    Route::post('/updateUser/{id}', [UserController::class, 'updateUser']);
    // Add To Cart
    Route::post('/addToCart/{id}', [CartController::class, 'addToCart']);
    // Checkout
    Route::post('/checkout/{id}', [CartController::class, 'checkout']);
});

// Go login page
Route::get('/login', [UserController::class, 'showLoginPage'])->name('login');
// User login
Route::post('/signIn', [UserController::class, 'signin']);
// User signout
Route::get('/signOut', [UserController::class, 'signout']);
// Go to home
Route::get('/', [BilliardController::class, 'showHomePage']);
// User register
Route::post('/signUp', [UserController::class, 'signup']);
// Go to About Us
Route::get('/aboutUs', [UserController::class, 'showAboutUsPage']);
// Search Billiard
Route::post('/searchBilliard', [BilliardController::class, 'searchBilliard']);
