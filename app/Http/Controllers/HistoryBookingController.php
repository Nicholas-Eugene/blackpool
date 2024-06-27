<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryBooking;

class HistoryBookingController extends Controller
{
    // Metode untuk menampilkan halaman riwayat booking
    public function index(Request $request)
    {
        // Mengambil parameter sorting dari request
        $sort = $request->input('sort');
        
        // Membuat query untuk mengambil data riwayat booking dengan relasi 'table'
        $query = HistoryBooking::with('table'); // Mengasumsikan relasi dinamakan 'table'
        
        // Menjalankan query dan mengambil semua data
        $histories = $query->get();
        
        // Mengembalikan tampilan 'historyBooking' dengan data riwayat booking
        return view('historyBooking', compact('histories'));
    }

    // Metode untuk menampilkan detail riwayat booking berdasarkan ID
    public function showBooking($id)
    {
        // Mengambil data riwayat booking dengan relasi 'table' dan 'user' berdasarkan ID
        $history = HistoryBooking::with('table', 'user')->findOrFail($id);
        
        // Mengembalikan tampilan 'historyBookingDetails' dengan data riwayat booking
        return view('historyBookingDetails', compact('history'));
    }

    // Metode untuk mendapatkan daftar waktu booking sebagai atribut
    public function getTimeListAttribute()
    {
        // Memecah string waktu yang dipisahkan dengan koma menjadi array
        return explode(',', $this->time);
    }
}