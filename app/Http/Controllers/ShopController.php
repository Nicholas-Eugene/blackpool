<?php

namespace App\Http\Controllers;

use App\Models\Stick;
use App\Models\FoodAndBeverage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    // Fungsi untuk menampilkan menu toko dan mengarahkan ke halaman stick
    public function showShopMenu(){
        return redirect()->route('stick');
    }

    // Fungsi untuk menampilkan semua produk stick
    public function showSticks(){
        $stick = Stick::all();
        return view('shop')->with(['stick' => $stick, 'section' => 'stick']);
    }

    // Fungsi untuk menampilkan semua produk makanan dan minuman
    public function showFoodAndBeverage(){
        $foodandbeverage = FoodAndBeverage::all();
        return view('shop')->with(['foodandbeverage' => $foodandbeverage, 'section' => 'foodandbeverage']);
    }

    // Fungsi untuk mencari produk berdasarkan nama
    public function searchProduct(Request $request){
        $query = $request->search;
        $stick = Stick::where('name', 'like', "%$query%")->get();
        $foodandbeverage = FoodAndBeverage::where('name', 'like', "%$query%")->get();
        return view('shop')->with(['stick' => $stick, 'foodandbeverage' => $foodandbeverage, 'section' => 'search']);
    }

    // Fungsi untuk menampilkan halaman pemesanan stick
    public function showBookingStick(Request $request){
        $stick = Stick::find($request->route('id'));
        return view('stickbooking')->with('stick', $stick);
    }

    // Fungsi untuk menampilkan halaman pemesanan makanan dan minuman
    public function showBookingFoodAndBeverage(Request $request){
        $foodandbeverage = FoodAndBeverage::find($request->route('id'));
        return view('foodandbeveragebooking')->with('foodandbeverage', $foodandbeverage);
    }
}
