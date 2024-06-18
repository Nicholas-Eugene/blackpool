<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryBooking;

class HistoryBookingController extends Controller{
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        $query = HistoryBooking::with('table'); // Assuming the relationship is called 'table'
        $histories = $query->get();
        return view('historyBooking', compact('histories'));
    }

    public function showBooking($id)
    {
        $history = HistoryBooking::with('table', 'user')->findOrFail($id);
        return view('historyBookingDetails', compact('history'));
    }

    public function getTimeListAttribute()
    {
        return explode(',', $this->time);
    }
}


