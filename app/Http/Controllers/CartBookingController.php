<?php

namespace App\Http\Controllers;

use App\Models\CartBooking;
use App\Models\Booking; // Asumsi model Booking ada untuk menyimpan riwayat pemesanan
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartBookingController extends Controller
{
    // Fungsi untuk menambahkan meja ke keranjang pemesanan
    public function addToCart(Request $request, $id)
    {
        $table = Table::find($id);
        if (!$table) {
            return redirect()->back()->withErrors('Table not found.');
        }

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Membuat entri keranjang untuk meja yang dipilih
        $cart = Cart::create([
            'table_id' => $table->id,
            'user_id' => $user->id,
            'date' => now()->format('Y-m-d'),
            'time' => json_encode($request->start_times), // Menyimpan waktu sebagai array JSON
            'totalprice' => $request->totalprice,
            'tablenumber' => $table->id,
            'totaltables' => 1, // Asumsi 1 meja untuk kesederhanaan
        ]);

        return redirect()->route('payment.page', ['cartId' => $cart->id]);
    }

    // Fungsi untuk menangani proses checkout
    public function checkout(Request $request, $id)
    {
        $cart = Cart::where(['user_id' => Auth::user()->id, 'table_id' => $id])->first();

        if (!$cart) {
            return redirect()->back()->withErrors('Cart not found.');
        }

        // Asumsi ada model Booking untuk menyimpan riwayat pemesanan
        Booking::create([
            'table_id' => $id,
            'user_id' => Auth::user()->id,
            'date' => now(),
            'time' => $cart->time, // Pastikan kolom 'time' di 'bookings' dapat menyimpan format JSON atau array
            'totalprice' => $cart->totalprice + 15000,
            'status' => 'pending', // Tambahkan kolom status jika diperlukan
        ]);

        $cart->delete();

        return redirect('/')->with('success', 'Booking confirmed and cart deleted.');
    }

    // Fungsi untuk menampilkan halaman pembayaran
    public function showPaymentPage($cartId)
    {
        $cart = Cart::findOrFail($cartId);
        return view('payment')->with('cart', $cart);
    }
}

