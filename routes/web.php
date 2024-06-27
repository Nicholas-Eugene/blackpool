<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartBookingController;
use App\Http\Controllers\HistoryBookingController;
use App\Http\Controllers\AdminController;

// Group route untuk admin yang dilindungi oleh middleware 'auth' dan 'is_admin'
Route::middleware(['auth', 'is_admin'])->group(function () {
    // Halaman dashboard admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // Halaman daftar pengguna admin
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    // Halaman daftar booking admin
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    // Halaman makanan dan minuman admin
    Route::get('/admin/foods-and-beverages', [AdminController::class, 'foodsAndBeverages'])->name('admin.foodsAndBeverages');
    // Halaman daftar stik admin
    Route::get('/admin/sticks', [AdminController::class, 'sticks'])->name('admin.sticks');

    // Halaman buat makanan dan minuman baru
    Route::get('/admin/foods-and-beverages/create', [AdminController::class, 'createFoodAndBeverage'])->name('admin.createFoodAndBeverage');
    // Proses simpan makanan dan minuman baru
    Route::post('/admin/foods-and-beverages', [AdminController::class, 'storeFoodAndBeverage'])->name('admin.storeFoodAndBeverage');
    // Halaman edit makanan dan minuman
    Route::get('/admin/foods-and-beverages/{id}/edit', [AdminController::class, 'editFoodAndBeverage'])->name('admin.editFoodAndBeverage');
    // Proses update makanan dan minuman
    Route::put('/admin/foods-and-beverages/{id}', [AdminController::class, 'updateFoodAndBeverage'])->name('admin.updateFoodAndBeverage');
    // Proses hapus makanan dan minuman
    Route::delete('/admin/foods-and-beverages/{id}', [AdminController::class, 'deleteFoodAndBeverage'])->name('admin.deleteFoodAndBeverage');

    // Halaman buat stik baru
    Route::get('/admin/sticks/create', [AdminController::class, 'createStick'])->name('admin.createStick');
    // Proses simpan stik baru
    Route::post('/admin/sticks', [AdminController::class, 'storeStick'])->name('admin.storeStick');
    // Halaman edit stik
    Route::get('/admin/sticks/{id}/edit', [AdminController::class, 'editStick'])->name('admin.editStick');
    // Proses update stik
    Route::put('/admin/sticks/{id}', [AdminController::class, 'updateStick'])->name('admin.updateStick');
    // Proses hapus stik
    Route::delete('/admin/sticks/{id}', [AdminController::class, 'deleteStick'])->name('admin.deleteStick');

    // Halaman edit pengguna
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.editUser');
    // Proses update pengguna
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
    // Proses hapus pengguna
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
});

// Group route yang dilindungi oleh middleware 'security'
Route::group(['middleware' => 'security'], function(){
    // Halaman pembayaran
    Route::get('/payment', [CartController::class, 'showPaymentPage'])->name('payment');
    // Halaman riwayat
    Route::get('/history', [CartController::class, 'showHistoryPage'])->name('history');
    // Halaman detail riwayat
    Route::get('/historyDetail/{historyIds}', [CartController::class, 'showHistoryDetailPage'])->name('historydetail');
    // Aksi checkout
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

    // Halaman riwayat booking
    Route::get('/historyBooking', [HistoryBookingController::class, 'index']);
    // Halaman detail riwayat booking
    Route::get('/historyBooking{id}', [HistoryBookingController::class, 'showBooking'])->name('history.booking');
    // Halaman profil pengguna
    Route::get('/profile', [UserController::class, 'showProfilePage'])->name('profile');
    // Update pengguna
    Route::post('/updateUser/{id}', [UserController::class, 'updateUser']);
    // Tambah ke keranjang
    Route::post('/addToCart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
    // Tambah jumlah item di keranjang
    Route::post('/cart/increment/{id}', [CartController::class, 'incrementQuantity'])->name('cart.increment');
    // Kurangi jumlah item di keranjang
    Route::post('/cart/decrement/{id}', [CartController::class, 'decrementQuantity'])->name('cart.decrement');
    // Bersihkan keranjang
    Route::post('/clearCart', [CartController::class, 'clearCart'])->name('cart.clear');
    // Tambah ke keranjang dari toko
    Route::post('/addToCart/{type}/{id}', [CartController::class, 'addToCart']);
    // Checkout dari toko
    Route::post('/checkout/{type}/{id}', [CartController::class, 'checkout']);
});

// Route untuk otentikasi
// Halaman login
Route::get('/login', [UserController::class, 'showLoginPage'])->name('login');
// Proses login
Route::post('/signIn', [UserController::class, 'signin']);
// Proses logout
Route::get('/signOut', [UserController::class, 'signout']);
// Proses pendaftaran
Route::post('/signUp', [UserController::class, 'signup']);
// Halaman tentang kami
Route::get('/aboutUs', [UserController::class, 'showAboutUsPage']);
// Halaman beranda
Route::get('/', [UserController::class, 'showhomePage']);
// Halaman booking
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
// Proses simpan booking
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
// Halaman pembayaran berdasarkan id keranjang
Route::get('/payment/{cartId}', [BookingController::class, 'showPaymentPage'])->name('payment.page');
// Proses konfirmasi pesanan berdasarkan id keranjang
Route::post('/confirmOrder/{cartId}', [BookingController::class, 'confirmOrder'])->name('confirm.order');
// Dapatkan booking berdasarkan id meja
Route::get('/tables/{tableId}/bookings', [BookingController::class, 'getTableBookings']);
// Route untuk resource keranjang
Route::resource('carts', CartController::class);

// Route untuk toko - akses publik
// Halaman menu toko
Route::get('/shop', [ShopController::class, 'showShopMenu'])->name('shop');
// Halaman daftar stik
Route::get('/stick', [ShopController::class, 'showSticks'])->name('stick');
// Halaman daftar makanan dan minuman
Route::get('/foodandbeverage', [ShopController::class, 'showFoodAndBeverage'])->name('foodandbeverage');
