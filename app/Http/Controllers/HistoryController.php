<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller{
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        $query = History::with('table'); // Assuming the relationship is called 'table'
        $histories = $query->get();
        return view('history', compact('histories'));
    }

    public function showBooking($id)
    {
        $history = History::with('table', 'user')->findOrFail($id);
        return view('historyBooking', compact('history'));
    }

    public function getTimeListAttribute()
    {
        return explode(',', $this->time);
    }
}


