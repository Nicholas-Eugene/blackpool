<?php

namespace App\Http\Controllers;

use App\Models\Stick;
use App\Models\FoodAndBeverage;
use App\Models\Cart;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class CartController extends Controller
{
    public function addToCart(Request $request)
{
    $productId = $request->route('id');
    $productType = $request->route('type');

    if ($productType === 'stick') {
        $product = Stick::find($productId);
        if (!$product) {
            return redirect()->back()->withErrors(['Invalid stick ID']);
        }
    } elseif ($productType === 'food') {
        $product = FoodAndBeverage::find($productId);
        if (!$product) {
            return redirect()->back()->withErrors(['Invalid food or beverage ID']);
        }
    }

    $existingCartItem = Cart::where('user_id', Auth::id())
        ->where('product_id', $productId)
        ->where('product_type', $productType)
        ->first();

    if ($existingCartItem) {
        $existingCartItem->quantity += $request->quantity ?? 1;
        $existingCartItem->save();
    } else {
        $data = [
            'user_id' => Auth::user()->id,
            'product_id' => $productId,
            'product_type' => $productType,
            'quantity' => $request->quantity ?? 1,
            'totalprice' => $request->totalprice ?? 0,
            'date' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ];

        Cart::create($data);
    }

    return redirect()->back()->with('success', 'Product has been successfully added to cart.');
}

    public function showPaymentPage()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('payment')->with('cartItems', $cartItems);
    }

    public function checkout(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $historyIds = [];
    
        foreach ($cartItems as $cart) {
            $product = null;
    
            if ($cart->product_type === 'stick') {
                $product = Stick::find($cart->product_id);
            } elseif ($cart->product_type === 'food') {
                $product = FoodAndBeverage::find($cart->product_id);
            }
    
            if ($product) {

                if ($product->stock < $cart->quantity) {
                    return redirect()->back()->withErrors(['Not enough stock for ' . $product->name]);
                }
                
                $data = [
                    'user_id' => Auth::user()->id,
                    'date' => now()->toDateString(),
                    'time' => now()->toTimeString(),
                    'totalprice' => $cart->quantity * $product->price,
                    'paymentmethod' => $request->paymentmethod,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'product_id' => $cart->product_id,
                    'product_type' => $cart->product_type,
                    'quantity' => $cart->quantity
                ];
    
                $history = History::create($data);
                $historyIds[] = $history->id;
    
                // Decrement the stock
                if ($cart->product_type === 'stick' && $product->stock >= $cart->quantity) {
                    $product->stock -= $cart->quantity;
                    $product->save();
                } elseif ($cart->product_type === 'food' && $product->stock >= $cart->quantity) {
                    $product->stock -= $cart->quantity;
                    $product->save();
                }
    
                $cart->delete();
            }
        }
    
        return redirect()->route('historydetail', ['historyIds' => implode(',', $historyIds)]);
    }
    

    
    public function showHistoryDetailPage($historyIds)
    {
    $ids = explode(',', $historyIds);
    $historyItems = History::whereIn('id', $ids)
        ->with(['stick', 'foodAndBeverage'])
        ->get();

    $totalPrice = $historyItems->sum('totalprice');
    $totalPriceWithAdmin = $totalPrice + 10000; // Adjust admin fee if necessary

    return view('historydetail', compact('historyItems', 'totalPrice', 'totalPriceWithAdmin'));
    }

    public function showHistoryPage()
    {
    $histories = History::where('user_id', Auth::id())
        ->with(['stick', 'foodAndBeverage'])
        ->get()
        ->groupBy(function ($item) {
            return $item->date . ' ' . $item->time;
        });

    return view('history', compact('histories'));
    }

    public function incrementQuantity($id)
    {
        $cartItem = Cart::find($id);
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        }

        return redirect()->back()->with('success', 'Quantity increased.');
    }

    public function decrementQuantity($id)
    {
        $cartItem = Cart::find($id);
        if ($cartItem && $cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
        }

        return redirect()->back()->with('success', 'Quantity decreased.');
    }

    // Clear cart
    public function clearCart()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Cart has been cleared.');
    }
}