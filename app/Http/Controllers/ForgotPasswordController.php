<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("forgotpassword", [
            "title" =>"Forgot Password"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validation(ForgotPasswordRequest $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email:dns',
        ]);

        // Periksa apakah email ada dalam database
        $user = User::where('email', $request->email)
                    ->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email not found.',
            ]);
        }

        session(['reset_user' => $user]);

        // Tentukan kategori yang dipilih oleh pengguna
        $category = $user->category;

        // Arahkan pengguna ke form forgot password yang sesuai dengan kategori
        if ($category === 'Fiction') {
            return redirect()->route('forgotpasswordfiction.index');
        } elseif ($category === 'Pet') {
            return redirect()->route('forgotpasswordpet.index');
        } elseif ($category === 'Place') {
            return redirect()->route('forgotpasswordplace.index');
        } else {
            // Kategori tidak valid
            return back()->withErrors([
                'email' => 'Invalid category for the user.',
            ]);
        }
    }

}
