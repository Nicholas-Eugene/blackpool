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
    // Fungsi untuk menampilkan halaman login
    public function showLoginPage(){
        return view('login');
    }

    // Fungsi untuk menampilkan detail riwayat transaksi
    public function showHistoryDetailPage($historyIds)
    {
        $ids = explode(',', $historyIds);
        $historyItems = History::whereIn('id', $ids)
            ->with(['stick', 'foodAndBeverage'])
            ->get();

        $totalPrice = $historyItems->sum('totalprice');
        $totalPriceWithAdmin = $totalPrice + 10000; // Tambahan biaya admin jika diperlukan

        return view('historydetail', compact('historyItems', 'totalPrice', 'totalPriceWithAdmin'));
    }

    // Fungsi untuk menampilkan halaman riwayat transaksi
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

    // Fungsi untuk menangani proses login
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

        // Menyimpan cookie jika 'remember me' dipilih
        if($remember){
            Cookie::queue('rememberedusername', $request->username, 60*24*7);
            Cookie::queue('rememberedpassword', $request->password, 60*24*7);
        }else{
            Cookie::queue(Cookie::forget('rememberedusername'));
            Cookie::queue(Cookie::forget('rememberedpassword'));
        }

        // Mengecek kredensial pengguna
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

    // Fungsi untuk menangani proses pendaftaran
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

        // Login otomatis setelah pendaftaran
        if (Auth::attempt($userCredential)) {
            return redirect('/');
        }
    }

    // Fungsi untuk menangani proses logout
    public function signout(){
        Auth::logout();
        return redirect('/');
    }

    // Fungsi untuk menampilkan halaman profil
    public function showProfilePage(){
        return view('profile');
    }

    // Fungsi untuk menampilkan halaman utama
    public function showhomePage(){
        return view('home');
    }

    // Fungsi untuk memperbarui informasi pengguna
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
    
        // Mengelola upload foto profil
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

    // Fungsi untuk menampilkan halaman 'Tentang Kami'
    public function showAboutUsPage(){
        return view('aboutUs');
    }
}
