<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HistoryController;

// Group routes that require security middleware
Route::group(['middleware' => 'security'], function(){
    // Go to history
    Route::get('/history', [HistoryController::class, 'index']);
    // Go to history details
    Route::get('/historyBooking{id}', [HistoryController::class, 'showBooking'])->name('history.booking');
    // Go Profile Page
    Route::get('/profile', [UserController::class, 'showProfilePage']);
    // Update user
    Route::post('/updateUser/{id}', [UserController::class, 'updateUser']);
    // Add To Cart
    Route::post('/addToCart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
    // Checkout
    Route::post('/checkout/{id}', [CartController::class, 'checkout']);
});

// Authentication routes
// Go login page
Route::get('/login', [UserController::class, 'showLoginPage'])->name('login');
// User login
Route::post('/signIn', [UserController::class, 'signin']);
// User signout
Route::get('/signOut', [UserController::class, 'signout']);
// User register
Route::post('/signUp', [UserController::class, 'signup']);
// Go to About Us
Route::get('/aboutUs', [UserController::class, 'showAboutUsPage']);

Route::get('/', [BookingController::class, 'index'])->name('booking.index');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/payment/{cartId}', [BookingController::class, 'showPaymentPage'])->name('payment.page');
Route::post('/confirmOrder/{cartId}', [BookingController::class, 'confirmOrder'])->name('confirm.order');
Route::get('/tables/{tableId}/bookings', [BookingController::class, 'getTableBookings']);
// Cart routes
Route::resource('carts', CartController::class);

