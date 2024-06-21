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

    public function createFoodAndBeverage()
    {
        return view('admin.create_foodandbeverage');
    }

    public function storeFoodAndBeverage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'mainpic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|string|max:255',
        ]);

        // Define the storage path
        $path = $request->file('mainpic')->storeAs('public/img/fnb', $request->file('mainpic')->getClientOriginalName());

        $foodAndBeverage = new FoodAndBeverage;
        $foodAndBeverage->name = $validated['name'];
        $foodAndBeverage->price = $validated['price'];
        $foodAndBeverage->description = $validated['description'];
        $foodAndBeverage->stock = $validated['stock'];
        $foodAndBeverage->mainpic = 'storage/img/fnb/' . $request->file('mainpic')->getClientOriginalName();
        $foodAndBeverage->type = $validated['type'];
        $foodAndBeverage->save();

        return redirect()->route('admin.foodsAndBeverages')->with('success', 'Food or Beverage created successfully.');
    }

    public function editFoodAndBeverage($id)
    {
        $foodAndBeverage = FoodAndBeverage::findOrFail($id);
        return view('admin.edit_foodandbeverage', compact('foodAndBeverage'));
    }

    public function updateFoodAndBeverage(Request $request, $id)
    {
        $foodAndBeverage = FoodAndBeverage::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'mainpic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|string|max:255',
        ]);

        if ($request->hasFile('mainpic')) {
            // Define the storage path
            $path = $request->file('mainpic')->storeAs('public/img/fnb', $request->file('mainpic')->getClientOriginalName());
            $foodAndBeverage->mainpic = $path;
        }

        $foodAndBeverage->name = $validated['name'];
        $foodAndBeverage->price = $validated['price'];
        $foodAndBeverage->description = $validated['description'];
        $foodAndBeverage->stock = $validated['stock'];
        $foodAndBeverage->type = $validated['type'];
        $foodAndBeverage->save();

        return redirect()->route('admin.foodsAndBeverages')->with('success', 'Food or Beverage updated successfully.');
    }

    public function deleteFoodAndBeverage($id)
    {
        $foodAndBeverage = FoodAndBeverage::findOrFail($id);
        $foodAndBeverage->delete();

        return redirect()->route('admin.foodsAndBeverages')->with('success', 'Food or Beverage deleted successfully.');
    }
}
