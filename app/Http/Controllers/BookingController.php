<?php

namespace App\Http\Controllers;

use App\Models\HistoryBooking;
use App\Models\Booking; // Pastikan ini sudah diimpor
use App\Models\CartBooking;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Middleware untuk memastikan pengguna telah terautentikasi
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan halaman booking dengan semua tabel dan waktu yang sudah dibooking
    public function index()
    {
        $tables = Table::all(); // Mengambil semua tabel

        // Mendapatkan booking untuk setiap tabel
        foreach ($tables as $table) {
            $bookings = Booking::where('table_id', $table->id)
                ->whereDate('date', now()->toDateString())
                ->get(['time']);

            $bookedTimes = [];
            foreach ($bookings as $booking) {
                $bookedTimes = array_merge($bookedTimes, json_decode($booking->time, true));
            }

            $table->booked_times = $bookedTimes;
        }

        return view('booking', compact('tables'));
    }

    // Menyimpan booking ke dalam database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_times' => 'required|array',
            'start_times.*' => 'required|string',
            'table_ids' => 'required|string',
            'totalprice' => 'required|numeric',
        ]);

        $tableIds = explode(',', $validatedData['table_ids']);
        $totalPrice = $validatedData['totalprice'];

        $cart = null;

        foreach ($tableIds as $tableId) {
            $cart = CartBooking::create([
                'user_id' => Auth::id(),
                'table_id' => $tableId,
                'date' => now()->toDateString(),
                'time' => json_encode($validatedData['start_times']), // Menyimpan waktu sebagai string JSON
                'totalprice' => $totalPrice,
                'status' => 'pending',
            ]);
        }

        if ($cart) {
            return redirect()->route('payment.page', ['cartId' => $cart->id]);
        } else {
            return redirect()->route('booking.index')->withErrors('Gagal membuat cart.');
        }
    }

    // Mengonfirmasi pesanan dan memindahkannya ke dalam riwayat booking
    public function confirmOrder(Request $request, $cartId)
    {
        $cart = CartBooking::findOrFail($cartId);

        if ($cart && $cart->status == 'pending') {
            // Memeriksa apakah slot waktu yang dipilih tersedia
            $selectedTimes = json_decode($cart->time);
            foreach ($selectedTimes as $selectedTime) {
                $existingBooking = Booking::where('table_id', $cart->table_id)
                    ->where('date', $cart->date)
                    ->whereJsonContains('time', $selectedTime)
                    ->exists();

                if ($existingBooking) {
                    return redirect()->route('booking.index')->withErrors('Slot waktu yang dipilih tidak tersedia. Silakan pilih waktu lain.');
                }
            }

            // Jika semua waktu yang dipilih tersedia, buat booking
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'table_id' => $cart->table_id,
                'date' => $cart->date,
                'time' => $cart->time,
                'totalprice' => $cart->totalprice,
                'status' => 'confirmed',
            ]);

            if ($booking) {
                // Buat catatan riwayat
                HistoryBooking::create([
                    'table_id' => $cart->table_id,
                    'user_id' => Auth::id(),
                    'booking_start' => $cart->date . ' ' . json_decode($cart->time)[0], // asumsi waktu mulai adalah yang pertama di array
                    'time' => $cart->time, // Menyimpan waktu sebagai string JSON
                    'total_price' => $cart->totalprice,
                    'payment_method' => $request->input('paymentmethod'),
                ]);

                $cart->delete();
                return redirect()->route('booking.index')->with('success', 'Booking dikonfirmasi dan ditambahkan ke riwayat.');
            }
        }
        
        $cart->delete();
        return redirect()->route('payment.page', ['cartId' => $cartId])->withErrors('Gagal mengonfirmasi pesanan.');
    }

    // Mendapatkan waktu booking untuk tabel tertentu
    public function getTableBookings($tableId)
    {
        $bookings = Booking::where('table_id', $tableId)
            ->whereDate('date', now()->toDateString())
            ->get(['time']);
        
        // Memastikan field 'time' berisi waktu yang ada di database
        $bookedTimes = [];
        foreach ($bookings as $booking) {
            $bookedTimes = array_merge($bookedTimes, json_decode($booking->time, true));
        }

        return response()->json(['bookings' => $bookedTimes]);
    }

    // Menampilkan halaman pembayaran untuk cart tertentu
    public function showPaymentPage($cartId)
    {
        $cart = CartBooking::findOrFail($cartId);
        return view('paymentBooking')->with('cart', $cart);
    }
}
