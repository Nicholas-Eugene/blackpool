<?php

namespace App\Http\Controllers;

use App\Models\CartBooking;
use App\Models\Booking; // Assuming Booking model exists for storing booking history
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartBookingController extends Controller
{
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

        // Create a cart entry for the selected table
        $cart = Cart::create([
            'table_id' => $table->id,
            'user_id' => $user->id,
            'date' => now()->format('Y-m-d'),
            'time' => json_encode($request->start_times), // Store times as JSON array
            'totalprice' => $request->totalprice,
            'tablenumber' => $table->id,
            'totaltables' => 1, // Assuming 1 table for simplicity
        ]);

        return redirect()->route('payment.page', ['cartId' => $cart->id]);
    }

    public function checkout(Request $request, $id)
    {
        $cart = Cart::where(['user_id' => Auth::user()->id, 'table_id' => $id])->first();

        if (!$cart) {
            return redirect()->back()->withErrors('Cart not found.');
        }

        // Assuming there's a Booking model to store booking history
        Booking::create([
            'table_id' => $id,
            'user_id' => Auth::user()->id,
            'date' => now(),
            'time' => $cart->time, // Ensure the 'time' column in 'bookings' can store JSON or array format
            'totalprice' => $cart->totalprice + 15000,
            'status' => 'pending', // Add status column if needed
        ]);

        $cart->delete();

        return redirect('/')->with('success', 'Booking confirmed and cart deleted.');
    }

    public function showPaymentPage($cartId)
    {
        $cart = Cart::findOrFail($cartId);
        return view('payment')->with('cart', $cart);
    }
}

