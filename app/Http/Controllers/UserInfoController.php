<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        return view("users.user", [
            "title" =>"Profile",
            'users' => User::all(),
            "profiles" => Profile::all(),
            'users' => $user
         ]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);
        
        return view('users.edituser', compact('user'),[
            'users' => User::all(),
            "users" => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        // Mengambil data user berdasarkan id
        $user = User::findOrFail($id);

        $rules = [
            'fullname' => 'required|min:5|max:255',
            'nickname' => 'required|min:3|max:255', 
            'category' => 'required', // Menambahkan aturan validasi untuk kategori
            'fictional_character' => 'nullable|min:3|max:255|unique:users,fictional_character,' . $user->id,
            'pet_name' => 'nullable|min:3|max:255|unique:users,pet_name,' . $user->id,
            'favorite_place' => 'nullable|min:3|max:255|unique:users,favorite_place,' . $user->id,
        ];

        // Lakukan validasi untuk category terlebih dahulu
        $categoryValidator = Validator::make($request->only('category'), ['category' => 'required']);

        // Jika validasi kategori gagal, kembalikan dengan pesan kesalahan yang sesuai
        if ($categoryValidator->fails()) {
            return redirect()->route('users.edit', $user->id)
                ->withErrors($categoryValidator)
                ->withInput($request->all()); // Menyimpan data input dalam session
        }

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()->route('users.edit', $user->id)
                ->withErrors($validator)
                ->withInput($request->all()); // Menyimpan data input dalam session
        }

        $user->fullname = $request->fullname;
        $user->nickname = $request->nickname;
        $user->category = $request->category; // Memperbarui kategori dengan kategori baru yang dipilih oleh pengguna

        // Set nilai berdasarkan kategori yang dipilih oleh pengguna
        if ($request->category == 'Fiction') {
            $user->fictional_character = $request->fictional_character;
            $user->pet_name = null;
            $user->favorite_place = null;
        } elseif ($request->category == 'Pet') {
            $user->fictional_character = null;
            $user->pet_name = $request->pet_name;
            $user->favorite_place = null;
        } elseif ($request->category == 'Place') {
            $user->fictional_character = null;
            $user->pet_name = null;
            $user->favorite_place = $request->favorite_place;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User Data Updated Successfully!'); // Mengembalikan ke halaman profil dengan pesan sukses
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
