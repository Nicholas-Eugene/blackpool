<?php

namespace App\Http\Controllers;

use App\Models\Billiard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BilliardController extends Controller
{
    public function showHomePage(){
        $billiards = Billiard::paginate(6);
        return view('home')->with('billiards', $billiards);
    }

    public function searchBilliard(Request $request){
        $query = $request->search;
        $billiards = Billiard::where('name', 'like', "%$query%")->paginate(6)->appends(['search' => $query]);
        return view('home')->with('billiards', $billiards);
    }

    public function showBilliardDetail(Request $request){
        $billiard = Billiard::find($request->route('id'));
        return view('detail')->with('billiard', $billiard);
    }

    public function showBookingBilliard(Request $request){
        $billiard = Billiard::find($request->route('id'));
        return view('booking')->with('billiard', $billiard);
    }
}
