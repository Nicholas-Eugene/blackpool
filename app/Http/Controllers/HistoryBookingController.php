<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryBooking;

class HistoryBookingController extends Controller{
    // Fungsi untuk menampilkan halaman daftar riwayat pemesanan
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        $query = HistoryBooking::with('table'); // Asumsikan hubungan dipanggil 'table'
        $histories = $query->get();
        return view('historyBooking', compact('histories'));
    }

    // Fungsi untuk menampilkan detail riwayat pemesanan
    public function showBooking($id)
    {
        $history = HistoryBooking::with('table', 'user')->findOrFail($id);
        return view('historyBookingDetails', compact('history'));
    }

    // Fungsi untuk mendapatkan daftar waktu dari atribut 'time'
    public function getTimeListAttribute()
    {
        return explode(',', $this->time);
    }
}


