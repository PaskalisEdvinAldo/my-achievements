<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $profiles = Profile::where('user_id', $userId)->get();

        return view("profiles.profile", [
            "title" =>"Profile",
            'users' => User::all(),
            "profiles" => Profile::all(),
            "profiles" => $profiles
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("profiles.create", [
            'title' => 'Create Profile',
            'users' => User::all(),
            "profiles" => Profile::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        $rules = [
            'birth_place' => 'required|min:1|max:500',
            'phone' => 'required|min:3|max:50',
            'birth_date' => 'required',
            'home_address' => 'required|min:1',
            'current_address' => 'required|min:1',
            'postal_code' => 'required|integer|max:99999',
            'grade' => 'required|integer',
            'expertise' => 'required',
            'admission' => 'required',
            'talent' => 'required|min:1',
            'interest' => 'required|min:1',
            'linkedin' => 'required|min:1|max:500',
            'facebook' => 'required|min:1|max:500',
            'instagram' => 'required|min:1|max:500',
            'branding' => 'required|min:3'
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return redirect()->route('profiles.create')->withInput()->withErrors($validator);
        }

        $user = auth()->user();

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->birth_place = $request->birth_place;
        $profile->birth_date = $request->birth_date;
        $profile->phone = $request->phone;
        $profile->home_address = $request->home_address;
        $profile->current_address = $request->current_address;
        $profile->postal_code = $request->postal_code;
        $profile->grade = $request->grade;
        $profile->expertise = $request->expertise;
        $profile->admission = $request->admission;
        $profile->talent = $request->talent;
        $profile->interest = $request->interest;
        $profile->linkedin = $request->linkedin;
        $profile->facebook = $request->facebook;
        $profile->instagram = $request->instagram;
        $profile->branding = $request->branding;

        $profile->save();

        if ($user instanceof \App\Models\User) {
            $user->update(['profile_completed' => true]);
        }

        return redirect()->route('profiles.index')->with('success', 'Profile Create Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = Auth::user();
        if ($user->id != $user_id) {
            return redirect()->back()->with('error', 'User does not match');
        }

        $profile = Profile::where('user_id', $user_id)->firstOrFail();

        $user = auth()->user();
        $profiles = $user ? $user->profile : null;
        
        return view('profiles.edit', compact('profile'),[
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {

        $rules = [
            'birth_place' => 'required|min:1|max:500',
            'phone' => 'required|min:3|max:50',
            'birth_date' => 'required',
            'home_address' => 'required|min:1',
            'current_address' => 'required|min:1',
            'postal_code' => 'required|integer|max:99999',
            'grade' => 'required|integer',
            'expertise' => 'required',
            'admission' => 'required',
            'talent' => 'required|min:1',
            'interest' => 'required|min:1',
            'linkedin' => 'required|min:1|max:500',
            'facebook' => 'required|min:1|max:500',
            'instagram' => 'required|min:1|max:500',
            'branding' => 'required|min:3'
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return redirect()->route('profiles.edit', $profile->id)->withInput()->withErrors($validator);
        }

        $user = auth()->user();
        $profile->user_id = $user->id;
        $profile->birth_place = $request->birth_place;
        $profile->birth_date = $request->birth_date;
        $profile->phone = $request->phone;
        $profile->home_address = $request->home_address;
        $profile->current_address = $request->current_address;
        $profile->postal_code = $request->postal_code;
        $profile->grade = $request->grade;
        $profile->expertise = $request->expertise;
        $profile->admission = $request->admission;
        $profile->talent = $request->talent;
        $profile->interest = $request->interest;
        $profile->linkedin = $request->linkedin;
        $profile->facebook = $request->facebook;
        $profile->instagram = $request->instagram;
        $profile->branding = $request->branding;

        $profile->save();

        if ($user instanceof \App\Models\User) {
            $user->update(['profile_completed' => true]);
        }

        return redirect()->route('profiles.index')->with('success', 'Profile Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
