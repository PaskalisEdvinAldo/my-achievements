<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordPlaceRequest;
use App\Models\User;

class ForgotPasswordPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil informasi user dari session
        $user = session('reset_user');

        // Jika tidak ada informasi user di session, alihkan kembali ke forgot password form
        if (!$user) {
            return redirect()->route('forgotpassword.index');
        }

        return view("forgotpasswordpet", [
            "title" =>"Forgot Password"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validationPlace(ForgotPasswordPlaceRequest $request)
    {
        // Validasi input
        $request->validate([
            'favorite_place' => 'required',
        ]);

        // Periksa apakah email dan nama ibu kandung sesuai
        $user = User::where('favorite_place', $request->favorite_place)
                    ->first();

        if (!$user) {
            return back()->withErrors([
                'favorite_place' => 'Favorite Place is incorrect.',
            ]);
        }

        // Simpan informasi user di session
        session(['reset_password_user' => $user]);

        return redirect()->route('resetpassword.index');
    }
}
