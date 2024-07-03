<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function index ()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(StoreUserRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek apakah pengguna adalah administrator
            if (Auth::user()->email == 'administrator@gmail.com') {
                return redirect()->route('dashboardadmins.index');
            }

            if ($request->has('remember')) {
                Cookie::queue('email', $request->email, 120);
                Cookie::queue('password', $request->password, 120);
            }

            return redirect()->route('dashboards.index');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout()
    {
        Auth::logout();

        Cookie::forget('laravel_session');

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('landingpage');
    }
}
