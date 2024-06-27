<?php

namespace App\Http\Controllers;

use App\Models\CartBooking;
use App\Models\Booking; // Mengasumsikan model Booking ada untuk menyimpan riwayat booking
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartBookingController extends Controller
{
    // Metode untuk menambahkan meja ke keranjang
    public function addToCart(Request $request, $id)
    {
        // Temukan meja berdasarkan ID
        $table = Table::find($id);
        if (!$table) {
            return redirect()->back()->withErrors('Table not found.');
        }

        // Dapatkan pengguna yang sedang login
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Buat entri keranjang untuk meja yang dipilih
        $cart = CartBooking::create([
            'table_id' => $table->id,
            'user_id' => $user->id,
            'date' => now()->format('Y-m-d'),
            'time' => json_encode($request->start_times), // Simpan waktu sebagai array JSON
            'totalprice' => $request->totalprice,
            'tablenumber' => $table->id,
            'totaltables' => 1, // Mengasumsikan 1 meja untuk kesederhanaan
        ]);

        // Arahkan ke halaman pembayaran setelah menambahkan ke keranjang
        return redirect()->route('payment.page', ['cartId' => $cart->id]);
    }

    // Metode untuk proses checkout
    public function checkout(Request $request, $id)
    {
        // Temukan keranjang berdasarkan pengguna dan ID meja
        $cart = CartBooking::where(['user_id' => Auth::user()->id, 'table_id' => $id])->first();

        if (!$cart) {
            return redirect()->back()->withErrors('Cart not found.');
        }

        // Membuat entri booking untuk menyimpan riwayat booking
        Booking::create([
            'table_id' => $id,
            'user_id' => Auth::user()->id,
            'date' => now(),
            'time' => $cart->time, // Pastikan kolom 'time' di 'bookings' dapat menyimpan format JSON atau array
            'totalprice' => $cart->totalprice + 15000,
            'status' => 'pending', // Tambahkan kolom status jika diperlukan
        ]);

        // Hapus keranjang setelah checkout
        $cart->delete();

        // Arahkan ke halaman utama dengan pesan sukses
        return redirect('/')->with('success', 'Booking confirmed and cart deleted.');
    }

    // Metode untuk menampilkan halaman pembayaran
    public function showPaymentPage($cartId)
    {
        // Temukan keranjang berdasarkan ID
        $cart = CartBooking::findOrFail($cartId);
        return view('payment')->with('cart', $cart);
    }
}