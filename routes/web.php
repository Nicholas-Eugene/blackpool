<?php

use App\Http\Controllers\BilliardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
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
    Route::get('/payment', [CartController::class, 'showPaymentPage'])->name('payment');
    // Go to history
    Route::get('/history', [CartController::class, 'showHistoryPage'])->name('history');
    // Go to History detail
    Route::get('/historyDetail/{historyIds}', [CartController::class, 'showHistoryDetailPage'])->name('historydetail');
    // Route for the checkout action
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

// Route for showing the history detail page
    Route::get('/historyDetail/{historyIds}', [CartController::class, 'showHistoryDetailPage'])->name('historydetail');
    // Go Profile Page
    Route::get('/profile', [UserController::class, 'showProfilePage']);
    // Update user
    Route::post('/updateUser/{id}', [UserController::class, 'updateUser']);
    // Add To Cart
    Route::post('/addToCart/{id}', [CartController::class, 'addToCart']);
    Route::post('/cart/increment/{id}', [CartController::class, 'incrementQuantity'])->name('cart.increment');
    Route::post('/cart/decrement/{id}', [CartController::class, 'decrementQuantity'])->name('cart.decrement');
    Route::post('/clearCart', [CartController::class, 'clearCart'])->name('cart.clear');
    // Add to Cart Shop
    Route::post('/addToCart/{type}/{id}', [CartController::class, 'addToCart']);
    // Checkout Shop
    Route::post('/checkout/{type}/{id}', [CartController::class, 'checkout']);
    
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
// Shop routes - public access
Route::get('/shop', [ShopController::class, 'showShopMenu'])->name('shop');
Route::get('/stick', [ShopController::class, 'showSticks'])->name('stick');
Route::get('/foodandbeverage', [ShopController::class, 'showFoodAndBeverage'])->name('foodandbeverage');
