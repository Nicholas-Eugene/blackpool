<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartBookingController;
use App\Http\Controllers\HistoryBookingController;
use App\Http\Controllers\AdminController;

// Kelompok rute yang memerlukan middleware auth dan is_admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    // Halaman dashboard admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // Halaman pengguna admin
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    // Halaman booking admin
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    // Halaman makanan dan minuman admin
    Route::get('/admin/foods-and-beverages', [AdminController::class, 'foodsAndBeverages'])->name('admin.foodsAndBeverages');
    // Halaman stick admin
    Route::get('/admin/sticks', [AdminController::class, 'sticks'])->name('admin.sticks');

    // Halaman pembuatan makanan dan minuman
    Route::get('/admin/foods-and-beverages/create', [AdminController::class, 'createFoodAndBeverage'])->name('admin.createFoodAndBeverage');
    // Penyimpanan makanan dan minuman baru
    Route::post('/admin/foods-and-beverages', [AdminController::class, 'storeFoodAndBeverage'])->name('admin.storeFoodAndBeverage');
    // Halaman pengeditan makanan dan minuman
    Route::get('/admin/foods-and-beverages/{id}/edit', [AdminController::class, 'editFoodAndBeverage'])->name('admin.editFoodAndBeverage');
    // Pembaruan makanan dan minuman
    Route::put('/admin/foods-and-beverages/{id}', [AdminController::class, 'updateFoodAndBeverage'])->name('admin.updateFoodAndBeverage');
    // Penghapusan makanan dan minuman
    Route::delete('/admin/foods-and-beverages/{id}', [AdminController::class, 'deleteFoodAndBeverage'])->name('admin.deleteFoodAndBeverage');

    // Halaman pembuatan stick
    Route::get('/admin/sticks/create', [AdminController::class, 'createStick'])->name('admin.createStick');
    // Penyimpanan stick baru
    Route::post('/admin/sticks', [AdminController::class, 'storeStick'])->name('admin.storeStick');
    // Halaman pengeditan stick
    Route::get('/admin/sticks/{id}/edit', [AdminController::class, 'editStick'])->name('admin.editStick');
    // Pembaruan stick
    Route::put('/admin/sticks/{id}', [AdminController::class, 'updateStick'])->name('admin.updateStick');
    // Penghapusan stick
    Route::delete('/admin/sticks/{id}', [AdminController::class, 'deleteStick'])->name('admin.deleteStick');

    // Halaman pengeditan pengguna
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.editUser');
    // Pembaruan pengguna
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
    // Penghapusan pengguna
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

    // Halaman utama toko
    Route::get('/', [ShopController::class, 'showShopMenu'])->name('shop');
    // Halaman daftar stick
    Route::get('/stick', [ShopController::class, 'showSticks'])->name('stick');
    // Halaman daftar makanan dan minuman
    Route::get('/foodandbeverage', [ShopController::class, 'showFoodAndBeverage'])->name('foodandbeverage');
});

// Kelompok rute yang memerlukan middleware security
Route::group(['middleware' => 'security'], function(){
    // Halaman pembayaran
    Route::get('/payment', [CartController::class, 'showPaymentPage'])->name('payment');
    // Halaman riwayat
    Route::get('/history', [CartController::class, 'showHistoryPage'])->name('history');
    // Halaman detail riwayat
    Route::get('/historyDetail/{historyIds}', [CartController::class, 'showHistoryDetailPage'])->name('historydetail');
    // Rute tindakan checkout
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

    // Halaman riwayat booking
    Route::get('/historyBooking', [HistoryBookingController::class, 'index']);
    // Halaman detail riwayat booking
    Route::get('/historyBooking{id}', [HistoryBookingController::class, 'showBooking'])->name('history.booking');
    // Halaman profil
    Route::get('/profile', [UserController::class, 'showProfilePage'])->name('profile');
    // Pembaruan pengguna
    Route::post('/updateUser/{id}', [UserController::class, 'updateUser']);
    // Tambahkan ke keranjang
    Route::post('/addToCart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
    // Tambah kuantitas keranjang
    Route::post('/cart/increment/{id}', [CartController::class, 'incrementQuantity'])->name('cart.increment');
    // Kurangi kuantitas keranjang
    Route::post('/cart/decrement/{id}', [CartController::class, 'decrementQuantity'])->name('cart.decrement');
    // Kosongkan keranjang
    Route::post('/clearCart', [CartController::class, 'clearCart'])->name('cart.clear');
    // Tambahkan ke keranjang toko
    Route::post('/addToCart/{type}/{id}', [CartController::class, 'addToCart']);
    // Checkout toko
    Route::post('/checkout/{type}/{id}', [CartController::class, 'checkout']);
});

// Rute otentikasi
// Halaman login
Route::get('/login', [UserController::class, 'showLoginPage'])->name('login');
// Login pengguna
Route::post('/signIn', [UserController::class, 'signin']);
// Logout pengguna
Route::get('/signOut', [UserController::class, 'signout']);
// Pendaftaran pengguna
Route::post('/signUp', [UserController::class, 'signup']);
// Halaman Tentang Kami
Route::get('/aboutUs', [UserController::class, 'showAboutUsPage']);
// Halaman utama
Route::get('/', [UserController::class, 'showhomePage']);
// Halaman booking
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
// Penyimpanan booking
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
// Halaman pembayaran
Route::get('/payment/{cartId}', [BookingController::class, 'showPaymentPage'])->name('payment.page');
// Konfirmasi pesanan
Route::post('/confirmOrder/{cartId}', [BookingController::class, 'confirmOrder'])->name('confirm.order');
// Mendapatkan booking untuk meja tertentu
Route::get('/tables/{tableId}/bookings', [BookingController::class, 'getTableBookings']);
// Rute keranjang
Route::resource('carts', CartController::class);

// Pencarian Produk
Route::get('/search', [ShopController::class, 'searchProduct'])->name('searchProduct');
// Rute toko - akses publik
// Halaman toko
Route::get('/shop', [ShopController::class, 'showShopMenu'])->name('shop');
// Halaman stick
Route::get('/stick', [ShopController::class, 'showSticks'])->name('stick');
// Halaman makanan dan minuman
Route::get('/foodandbeverage', [ShopController::class, 'showFoodAndBeverage'])->name('foodandbeverage');
