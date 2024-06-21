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

    // Food and Beverage functions
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
            $foodAndBeverage->mainpic = 'storage/img/fnb/' . $request->file('mainpic')->getClientOriginalName();
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

    // Stick functions
    public function createStick()
    {
        return view('admin.create_stick');
    }

    public function storeStick(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'mainpic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pic2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pic3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pic4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Define the storage paths
        $mainPicPath = $request->file('mainpic')->storeAs('public/img/stick', $request->file('mainpic')->getClientOriginalName());

        $stick = new Stick;
        $stick->name = $validated['name'];
        $stick->price = $validated['price'];
        $stick->description = $validated['description'];
        $stick->stock = $validated['stock'];
        $stick->mainpic = 'storage/img/stick/' . $request->file('mainpic')->getClientOriginalName();
        if ($request->hasFile('pic2')) {
            $pic2Path = $request->file('pic2')->storeAs('public/img/stick', $request->file('pic2')->getClientOriginalName());
            $stick->pic2 = 'storage/img/stick/' . $request->file('pic2')->getClientOriginalName();
        }
        if ($request->hasFile('pic3')) {
            $pic3Path = $request->file('pic3')->storeAs('public/img/stick', $request->file('pic3')->getClientOriginalName());
            $stick->pic3 = 'storage/img/stick/' . $request->file('pic3')->getClientOriginalName();
        }
        if ($request->hasFile('pic4')) {
            $pic4Path = $request->file('pic4')->storeAs('public/img/stick', $request->file('pic4')->getClientOriginalName());
            $stick->pic4 = 'storage/img/stick/' . $request->file('pic4')->getClientOriginalName();
        }
        $stick->save();

        return redirect()->route('admin.sticks')->with('success', 'Stick created successfully.');
    }

    public function editStick($id)
    {
        $stick = Stick::findOrFail($id);
        return view('admin.edit_stick', compact('stick'));
    }

    public function updateStick(Request $request, $id)
    {
        $stick = Stick::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'mainpic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pic2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pic3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pic4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('mainpic')) {
            $mainPicPath = $request->file('mainpic')->storeAs('public/img/stick', $request->file('mainpic')->getClientOriginalName());
            $stick->mainpic = 'storage/img/stick/' . $request->file('mainpic')->getClientOriginalName();
        }
        if ($request->hasFile('pic2')) {
            $pic2Path = $request->file('pic2')->storeAs('public/img/stick', $request->file('pic2')->getClientOriginalName());
            $stick->pic2 = 'storage/img/stick/' . $request->file('pic2')->getClientOriginalName();
        }
        if ($request->hasFile('pic3')) {
            $pic3Path = $request->file('pic3')->storeAs('public/img/stick', $request->file('pic3')->getClientOriginalName());
            $stick->pic3 = 'storage/img/stick/' . $request->file('pic3')->getClientOriginalName();
        }
        if ($request->hasFile('pic4')) {
            $pic4Path = $request->file('pic4')->storeAs('public/img/stick', $request->file('pic4')->getClientOriginalName());
            $stick->pic4 = 'storage/img/stick/' . $request->file('pic4')->getClientOriginalName();
        }
        $stick->name = $validated['name'];
        $stick->price = $validated['price'];
        $stick->description = $validated['description'];
        $stick->stock = $validated['stock'];
        $stick->save();

        return redirect()->route('admin.sticks')->with('success', 'Stick updated successfully.');
    }

    public function deleteStick($id)
    {
        $stick = Stick::findOrFail($id);
        $stick->delete();

        return redirect()->route('admin.sticks')->with('success', 'Stick deleted successfully.');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }
    
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'is_admin' => 'required|boolean',
        ]);
    
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        $user->is_admin = $validated['is_admin'];
        $user->save();
    
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }
}    
