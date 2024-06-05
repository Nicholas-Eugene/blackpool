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

    public function showhistorydetailPage(Request $request){
        $history = History::find($request->route('id'));
        return view('historydetail')->with('history', $history);
    }

    public function showHistoryPage(){
        $histories = History::all();
        return view('history')->with('histories', $histories);
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

    public function updateUser(Request $request){
            $this->validate($request, [
                'username' => 'required',
                "profilepic" => "image",
                "email" => "required|email|unique:users"
            ]);

            $user = User::find($request->route('id'));
            $user->username = $request->username;
            if ($_FILES['photo']['size'] != 0) {
                $name = $request->file('photo')->getClientOriginalName();
                $request->file('photo')->storeAs('public/img', $name);
                $user->profilepic = $name;
            }
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

            return redirect('/home');
    }

    public function showAboutUsPage(){
        return view('aboutUs');
    }
}
