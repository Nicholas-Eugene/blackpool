<?php
// app/Http/Controllers/TableController.php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TableController extends Controller
{
    // Fungsi untuk mendapatkan daftar pemesanan meja pada tanggal hari ini
    public function getBookings(Table $table)
    {
        $bookings = $table->bookings()->whereDate('start_time', '=', now()->toDateString())->get(['start_time', 'end_time']);
        return response()->json(['bookings' => $bookings]);
    }
}

