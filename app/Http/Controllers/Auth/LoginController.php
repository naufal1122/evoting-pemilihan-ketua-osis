<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\User; // Tambahkan ini untuk model User

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function logout(Request $request)
    {
        Auth::logout();
        return redirect('/'); // Atau redirect ke halaman lain
    }

    public function login(Request $request) {
        $this->validate($request, [
            'password' => 'required'
        ]);

        // Mencari user berdasarkan password
        $user = User::where('password', $request->password)->first();

        // Cek apakah user ditemukan berdasarkan password
        if ($user) {
            Auth::login($user);
            // Menggunakan session flash untuk notifikasi sukses
            return redirect()->route('home')->with('success', 'Login Berhasil');
        } else {
            // Menggunakan session flash untuk notifikasi warning
            return redirect()->route('login')->with('warning', 'Password Salah');
        }
    }


}
