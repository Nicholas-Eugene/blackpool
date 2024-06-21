<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{

    public function showLoginPage(){
        return view('login');
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

   
    public function signin(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $userCredential = [
            'username' => $request['username'],
            'password' => $request['password']
        ];

        $remember = $request->has('rememberme');

        if($remember){
            Cookie::queue('rememberedusername', $request->username, 60*24*7);
            Cookie::queue('rememberedpassword', $request->password, 60*24*7);
        }else{
            Cookie::queue(Cookie::forget('rememberedusername'));
            Cookie::queue(Cookie::forget('rememberedpassword'));
        }

        if (Auth::attempt($userCredential, $remember)) {
            return redirect('/');
        }else{
            if(User::where('username', $request['username'])->exists()){
                $errors = ['Incorrect password'];
                return redirect('/login')->withErrors($errors);
            }else{
                $errors = ['Username is not registered!'];
                return redirect('/login')->withErrors($errors);
            }
        }
    }

    public function signup(Request $request){
        $this->validate($request, [
            'usernameRegist' => 'required',
            'email' => 'required|email|unique:users',
            "txtPassword" => "required",
            "txtConfirmPassword" => "required",
            "myCheckboxId" => "required"
        ]);

        $username = $request->usernameRegist;
        $email = $request->email;
        $password = $request->txtPassword;

        User::create([
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password),
            'profilepic' => ''
        ]);

        $userCredential = [
            'username' => $request['usernameRegist'],
            'password' => $request['txtPassword'],
        ];

        if (Auth::attempt($userCredential)) {
            return redirect('/');
        }
    }

    public function signout(){
        Auth::logout();
        return redirect('/');
    }

    public function showProfilePage(){
        return view('profile');
    }

    public function showhomePage(){
        return view('home');
    }

    public function updateUser(Request $request, $id){
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required',
        ]);
    
        $user = User::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
    
        // Handle profile picture upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = time() . '_' . $file->getClientOriginalName();
            $filePath = 'public/img';
            $file->storeAs($filePath, $name);
            $user->profilepic = $name;
        }
    
        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    
    

    public function showAboutUsPage(){
        return view('aboutUs');
    }
}
