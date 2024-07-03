<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Cookie;

class RegisterController extends Controller
{
    public function index (){
        return view('register', [
            'title' => 'Register'
        ]);
    }

    public function validation(StoreUserRequest $request){
        
        $validatedData = $request->validate([
            'fullname' => 'required|min:5|max:255',
            'nickname' => 'required|min:3|max:255',
            'email' => 'required|email:dns|unique:users,email',
            'category' => 'required',
            'fictional_character' => 'nullable|min:3|max:255|unique:users,fictional_character',
            'pet_name' => 'nullable|min:3|max:255|unique:users,pet_name',
            'favorite_place' => 'nullable|min:3|max:255|unique:users,favorite_place',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                ->numbers()
                ->symbols()
                ->mixedCase()
            ]
        ]);

        // Tentukan kategori yang dipilih oleh pengguna
        $category = $validatedData['category'];

        // Tentukan data yang akan disimpan berdasarkan kategori
        $dataToStore = [
            'fullname' => $validatedData['fullname'],
            'nickname' => $validatedData['nickname'],
            'category' => $validatedData['category'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ];

        // Tambahkan data sesuai dengan kategori yang dipilih
        if ($category === 'Fiction') {
            $dataToStore['fictional_character'] = $validatedData['fictional_character'];
        } elseif ($category === 'Pet') {
            $dataToStore['pet_name'] = $validatedData['pet_name'];
        } elseif ($category === 'Place') {
            $dataToStore['favorite_place'] = $validatedData['favorite_place'];
        }
        
        User::create($dataToStore);

        session()->flash('success', 'Registration Successfull! Please Login');

        Cookie::queue(Cookie::forget('email'));
        Cookie::queue(Cookie::forget('password'));
        
        $this->clearAuthCookie(); // Panggil metode clearAuthCookie() saat registrasi berhasil
        return redirect()->route('login.index');
    }

    protected function clearAuthCookie()
    {
        Cookie::queue(Cookie::forget('laravel_session'));
    }
}
