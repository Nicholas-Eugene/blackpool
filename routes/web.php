<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartBookingController;
use App\Http\Controllers\HistoryBookingController;
use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/admin/foods-and-beverages', [AdminController::class, 'foodsAndBeverages'])->name('admin.foodsAndBeverages');
    Route::get('/admin/sticks', [AdminController::class, 'sticks'])->name('admin.sticks');

    Route::get('/admin/foods-and-beverages/create', [AdminController::class, 'createFoodAndBeverage'])->name('admin.createFoodAndBeverage');
    Route::post('/admin/foods-and-beverages', [AdminController::class, 'storeFoodAndBeverage'])->name('admin.storeFoodAndBeverage');
    Route::get('/admin/foods-and-beverages/{id}/edit', [AdminController::class, 'editFoodAndBeverage'])->name('admin.editFoodAndBeverage');
    Route::put('/admin/foods-and-beverages/{id}', [AdminController::class, 'updateFoodAndBeverage'])->name('admin.updateFoodAndBeverage');
    Route::delete('/admin/foods-and-beverages/{id}', [AdminController::class, 'deleteFoodAndBeverage'])->name('admin.deleteFoodAndBeverage');

    Route::get('/admin/sticks/create', [AdminController::class, 'createStick'])->name('admin.createStick');
    Route::post('/admin/sticks', [AdminController::class, 'storeStick'])->name('admin.storeStick');
    Route::get('/admin/sticks/{id}/edit', [AdminController::class, 'editStick'])->name('admin.editStick');
    Route::put('/admin/sticks/{id}', [AdminController::class, 'updateStick'])->name('admin.updateStick');
    Route::delete('/admin/sticks/{id}', [AdminController::class, 'deleteStick'])->name('admin.deleteStick');
});
// Group routes that require security middleware
Route::group(['middleware' => 'security'], function(){
    Route::get('/payment', [CartController::class, 'showPaymentPage'])->name('payment');
    // Go to history
    Route::get('/history', [CartController::class, 'showHistoryPage'])->name('history');
    // Go to History detail
    Route::get('/historyDetail/{historyIds}', [CartController::class, 'showHistoryDetailPage'])->name('historydetail');
    // Route for the checkout action
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

    Route::get('/historyBooking', [HistoryBookingController::class, 'index']);
    // Go to history details
    Route::get('/historyBooking{id}', [HistoryBookingController::class, 'showBooking'])->name('history.booking');
    // Go Profile Page
    Route::get('/profile', [UserController::class, 'showProfilePage']);
    // Update user
    Route::post('/updateUser/{id}', [UserController::class, 'updateUser']);
    // Add To Cart
    Route::post('/addToCart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::post('/cart/increment/{id}', [CartController::class, 'incrementQuantity'])->name('cart.increment');
    Route::post('/cart/decrement/{id}', [CartController::class, 'decrementQuantity'])->name('cart.decrement');
    Route::post('/clearCart', [CartController::class, 'clearCart'])->name('cart.clear');
    // Add to Cart Shop
    Route::post('/addToCart/{type}/{id}', [CartController::class, 'addToCart']);
    // Checkout Shop
    Route::post('/checkout/{type}/{id}', [CartController::class, 'checkout']);
    
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
Route::get('/', [UserController::class, 'showhomePage']);
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/payment/{cartId}', [BookingController::class, 'showPaymentPage'])->name('payment.page');
Route::post('/confirmOrder/{cartId}', [BookingController::class, 'confirmOrder'])->name('confirm.order');
Route::get('/tables/{tableId}/bookings', [BookingController::class, 'getTableBookings']);
// Cart routes
Route::resource('carts', CartController::class);

// Shop routes - public access
Route::get('/shop', [ShopController::class, 'showShopMenu'])->name('shop');
Route::get('/stick', [ShopController::class, 'showSticks'])->name('stick');
Route::get('/foodandbeverage', [ShopController::class, 'showFoodAndBeverage'])->name('foodandbeverage');
