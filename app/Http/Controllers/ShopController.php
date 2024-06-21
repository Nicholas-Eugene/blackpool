<?php

namespace App\Http\Controllers;

use App\Models\Stick;
use App\Models\foodandbeverage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function showShopMenu(){
        return redirect()->route('stick');
    }

    public function showSticks(){
        $stick = Stick::all();
        return view('shop')->with(['stick' => $stick, 'section' => 'stick']);
    }

    public function showFoodAndBeverage(){
        $foodandbeverage = FoodAndBeverage::all();
        return view('shop')->with(['foodandbeverage' => $foodandbeverage, 'section' => 'foodandbeverage']);
    }

    public function searchProduct(Request $request){
        $query = $request->search;
        $stick = Stick::where('name', 'like', "%$query%")->paginate(6)->appends(['search' => $query]);
        $foodandbeverage = FoodAndBeverage::where('name', 'like', "%$query%")->paginate(6)->appends(['search' => $query]);
        return view('shop')->with(['stick' => $stick, 'foodandbeverage' => $foodandbeverage, 'section' => 'search']);
    }

    public function showStickDetail(Request $request){
        $stick = Stick::find($request->route('id'));
        return view('stickdetail')->with('stick', $stick);
    }

    public function showFoodAndBeverageDetail(Request $request){
        $foodandbeverage = FoodAndBeverage::find($request->route('id'));
        return view('foodandbeveragedetail')->with('foodandbeverage', $foodandbeverage);
    }

    public function showBookingStick(Request $request){
        $stick = Stick::find($request->route('id'));
        return view('stickbooking')->with('stick', $stick);
    }

    public function showBookingFoodAndBeverage(Request $request){
        $foodandbeverage = FoodAndBeverage::find($request->route('id'));
        return view('foodandbeveragebooking')->with('foodandbeverage', $foodandbeverage);
    }
}
