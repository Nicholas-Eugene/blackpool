<?php

namespace App\Http\Controllers;

use App\Models\HistoryBooking;
use App\Models\Booking;
use App\Models\CartBooking;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Konstruktor untuk memastikan semua metode dalam controller ini membutuhkan otentikasi
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Metode untuk menampilkan halaman booking
    public function index()
    {
        // Ambil semua meja
        $tables = Table::all();

        // Dapatkan booking untuk setiap meja
        foreach ($tables as $table) {
            $bookings = Booking::where('table_id', $table->id)
                ->whereDate('date', now()->toDateString())
                ->get(['time']);

            // Gabungkan waktu yang sudah dibooking
            $bookedTimes = [];
            foreach ($bookings as $booking) {
                $bookedTimes = array_merge($bookedTimes, json_decode($booking->time, true));
            }

            // Simpan waktu yang sudah dibooking di properti tabel
            $table->booked_times = $bookedTimes;
        }

        // Kembalikan tampilan booking dengan data meja
        return view('booking', compact('tables'));
    }

    // Metode untuk menyimpan booking
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'start_times' => 'required|array',
            'start_times.*' => 'required|string',
            'table_ids' => 'required|string',
            'totalprice' => 'required|numeric',
        ]);

        // Pisahkan ID meja dan harga total dari data yang divalidasi
        $tableIds = explode(',', $validatedData['table_ids']);
        $totalPrice = $validatedData['totalprice'];

        $cart = null;

        // Buat CartBooking untuk setiap meja
        foreach ($tableIds as $tableId) {
            $cart = CartBooking::create([
                'user_id' => Auth::id(),
                'table_id' => $tableId,
                'date' => now()->toDateString(),
                'time' => json_encode($validatedData['start_times']), // Simpan waktu sebagai string JSON
                'totalprice' => $totalPrice,
                'status' => 'pending',
            ]);
        }

        // Jika CartBooking berhasil dibuat, arahkan ke halaman pembayaran
        if ($cart) {
            return redirect()->route('payment.page', ['cartId' => $cart->id]);
        } else {
            return redirect()->route('booking.index')->withErrors('Failed to create cart.');
        }
    }

    // Metode untuk mengkonfirmasi pesanan
    public function confirmOrder(Request $request, $cartId)
    {
        $cart = CartBooking::findOrFail($cartId);

        if ($cart && $cart->status == 'pending') {
            // Periksa ketersediaan slot waktu yang dipilih
            $selectedTimes = json_decode($cart->time);
            foreach ($selectedTimes as $selectedTime) {
                $existingBooking = Booking::where('table_id', $cart->table_id)
                    ->where('date', $cart->date)
                    ->whereJsonContains('time', $selectedTime)
                    ->exists();

                if ($existingBooking) {
                    return redirect()->route('booking.index')->withErrors('Selected time slot is not available. Please choose another time.');
                }
            }

            // Jika semua slot waktu tersedia, buat booking
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'table_id' => $cart->table_id,
                'date' => $cart->date,
                'time' => $cart->time,
                'totalprice' => $cart->totalprice,
                'status' => 'confirmed',
            ]);

            if ($booking) {
                // Buat riwayat booking
                HistoryBooking::create([
                    'table_id' => $cart->table_id,
                    'user_id' => Auth::id(),
                    'booking_start' => $cart->date . ' ' . json_decode($cart->time)[0], // Menganggap waktu mulai adalah yang pertama dalam array
                    'time' => $cart->time, // Simpan waktu sebagai string JSON
                    'total_price' => $cart->totalprice,
                    'payment_method' => $request->input('paymentmethod'),
                ]);

                // Hapus cart setelah konfirmasi
                $cart->delete();
                return redirect()->route('booking.index')->with('success', 'Booking confirmed and added to history.');
            }
        }

        // Hapus cart jika konfirmasi gagal
        $cart->delete();
        return redirect()->route('payment.page', ['cartId' => $cartId])->withErrors('Failed to confirm order.');
    }

    // Metode untuk mendapatkan booking berdasarkan ID meja
    public function getTableBookings($tableId)
    {
        $bookings = Booking::where('table_id', $tableId)
            ->whereDate('date', now()->toDateString())
            ->get(['time']);

        // Gabungkan waktu yang sudah dibooking
        $bookedTimes = [];
        foreach ($bookings as $booking) {
            $bookedTimes = array_merge($bookedTimes, json_decode($booking->time, true));
        }

        // Kembalikan data booking dalam format JSON
        return response()->json(['bookings' => $bookedTimes]);
    }

    // Metode untuk menampilkan halaman pembayaran
    public function showPaymentPage($cartId)
    {
        $cart = CartBooking::findOrFail($cartId);
        return view('paymentBooking')->with('cart', $cart);
    }
}
