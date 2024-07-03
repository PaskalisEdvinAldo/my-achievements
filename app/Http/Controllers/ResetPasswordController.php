<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Ambil informasi pengguna dari sesi
        $user = session('reset_password_user');

        // Jika tidak ada informasi pengguna di sesi, alihkan kembali ke form forgot password
        if (!$user) {
            return redirect()->route('forgotpassword.index');
        }

        return view('resetpassword', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        // Periksa password lama
        $user = session('reset_password_user');
        $oldPassword = $user->password;

        // Validasi password baru
        $request->validate([
            'new_password' => [
                'required',
                'confirmed',
                'different:password',
                Password::min(8)
                    ->numbers()
                    ->symbols()
                    ->mixedCase()
            ],
        ]);

        // Periksa apakah password baru berbeda dengan password lama
        if (Hash::check($request->new_password, $oldPassword)) {
            return back()->withErrors([
                'new_password' => 'The new password must be different from the old password.',
            ]);
        }

        // Hash dan simpan password baru
        $hashedPassword = Hash::make($request->new_password);
        $user->update([
            'password' => $hashedPassword,
        ]);

        // Hapus informasi user dari session
        session()->forget('reset');

        return redirect()->route('login.index')->with('success', 'Password reset successful. Please login with your new password!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
