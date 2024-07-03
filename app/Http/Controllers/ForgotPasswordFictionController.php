<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordFictionRequest;
use App\Models\User;


class ForgotPasswordFictionController extends Controller
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

        return view("forgotpasswordfiction", [
            "title" =>"Forgot Password",
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validationFiction(ForgotPasswordFictionRequest $request)
    {
        // Validasi input
        $request->validate([
            'fictional_character' => 'required',
        ]);

        // Periksa apakah email dan karakter fiksi sesuai
        $user = User::where('fictional_character', $request->fictional_character)
                    ->first();

        if (!$user) {
            return back()->withErrors([
                'fictional_character' => 'Fictional Character Name is incorrect.',
            ]);
        }

        // Simpan informasi pengguna di sesi
        session(['reset_password_user' => $user]);

        return redirect()->route('resetpassword.index');
    }
}
