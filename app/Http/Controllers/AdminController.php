<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\FoodAndBeverage;
use App\Models\Stick;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function bookings()
    {
        $bookings = Booking::all();
        return view('admin.bookings', compact('bookings'));
    }

    public function foodsAndBeverages()
    {
        $foodsAndBeverages = FoodAndBeverage::all();
        return view('admin.foodsandbeverages', compact('foodsAndBeverages'));
    }

    public function sticks()
    {
        $sticks = Stick::all();
        return view('admin.sticks', compact('sticks'));
    }
}
