<?php

namespace App\Http\Controllers;

use App\Models\Billiard;
use App\Models\Cart;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class CartController extends Controller
{
    public function addToCart(Request $request){
        Cart::create([
            'billiard_id' => $request->route('id'),
            'user_id' => Auth::user()->id,
            'date' => now(),
            'time' => $request->time,
            'totalprice' => $request->totalprice,
            'tablenumber' => $request->tablenumber,
            'totaltables' => $request->totaltable,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $billiard  = Cart::where(['user_id' => Auth::user()->id, 'billiard_id' => $request->route('id')])->first();
        return view("payment")->with('billiard', $billiard);
    }

    public function checkout(Request $request){
        $cart = Cart::where(['user_id' => Auth::user()->id, 'billiard_id' => $request->route('id')])->first();

        History::create([
            'billiard_id' => $request->route('id'),
            'user_id' => Auth::user()->id,
            'date' => now(),
            'time' => $cart->time,
            'totalprice' => $cart->totalprice + 15000,
            'tablenumber' => $cart->tablenumber,
            'totaltables' => $cart->totaltables,
            'paymentmethod' => $request->paymentmethod,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $cart->delete();
        return redirect('/home');
    }
}
