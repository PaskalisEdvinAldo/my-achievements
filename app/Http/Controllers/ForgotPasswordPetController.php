<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordPetRequest;
use App\Models\User;

class ForgotPasswordPetController extends Controller
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
    public function validationPet(ForgotPasswordPetRequest $request)
    {
        // Validasi input
        $request->validate([
            'pet_name' => 'required',
        ]);

        // Periksa apakah email dan nama ibu kandung sesuai
        $user = User::where('pet_name', $request->pet_name)
                    ->first();

        if (!$user) {
            return back()->withErrors([
                'pet_name' => 'Pets name is incorrect.',
            ]);
        }

        // Simpan informasi user di session
        session(['reset_password_user' => $user]);

        return redirect()->route('resetpassword.index');
    }
}
