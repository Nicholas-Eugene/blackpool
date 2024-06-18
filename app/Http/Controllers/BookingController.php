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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tables = Table::all(); // Retrieve all tables or adjust the query as needed

        // Get bookings for each table
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
                'time' => json_encode($validatedData['start_times']), // Store the times as a JSON string
                'totalprice' => $totalPrice,
                'status' => 'pending',
            ]);
        }

        if ($cart) {
            return redirect()->route('payment.page', ['cartId' => $cart->id]);
        } else {
            return redirect()->route('booking.index')->withErrors('Failed to create cart.');
        }
    }

    public function confirmOrder(Request $request, $cartId)
    {
        $cart = CartBooking::findOrFail($cartId);

        if ($cart && $cart->status == 'pending') {
            // Check if the selected time slots are available
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

            if ($booking) {
                            // If all selected times are available, create booking
                $booking = Booking::create([
                    'user_id' => Auth::id(),
                    'table_id' => $cart->table_id,
                    'date' => $cart->date,
                    'time' => $cart->time,
                    'totalprice' => $cart->totalprice,
                    'status' => 'confirmed',
                ]);
                // Create history record
                HistoryBooking::create([
                    'table_id' => $cart->table_id,
                    'user_id' => Auth::id(),
                    'booking_start' => $cart->date . ' ' . json_decode($cart->time)[0], // assuming start time is the first in the array
                    'time' => $cart->time, // Store the times as a JSON string
                    'total_price' => $cart->totalprice,
                    'payment_method' => $request->input('paymentmethod'),
                ]);

                $cart->delete();
                return redirect()->route('booking.index')->with('success', 'Booking confirmed and added to history.');
            }
        }
        
        $cart->delete();
        return redirect()->route('payment.page', ['cartId' => $cartId])->withErrors('Failed to confirm order.');
    }

    public function getTableBookings($tableId)
    {
        $bookings = Booking::where('table_id', $tableId)
            ->whereDate('date', now()->toDateString())
            ->get(['time']);
        
        // Make sure the 'time' field contains actual times in your database
        $bookedTimes = [];
        foreach ($bookings as $booking) {
            $bookedTimes = array_merge($bookedTimes, json_decode($booking->time, true));
        }

        return response()->json(['bookings' => $bookedTimes]);
    }

    public function showPaymentPage($cartId)
    {
        $cart = CartBooking::findOrFail($cartId);
        return view('payment')->with('cart', $cart);
    }
}
