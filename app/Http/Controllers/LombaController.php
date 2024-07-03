<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\StoreLombaRequest;
use App\Http\Requests\UpdateLombaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LombaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $user = auth()->user();
        $profile = $user ? $user->profile : null;

        return view('events.event',[
            'title' => "Events",
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $profile = $user ? $user->profile : null;

        return view("events.create", [
            'title' => 'Event Registration',
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLombaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLombaRequest $request)
    {
        $rules = [
            'fullname' => 'required|min:5|max:255',
            'grade' => 'required',
            'expertise' => 'required',
            'event_select' => 'required',
            'event_field' => 'required',
            'event_type' => 'required',
            'daterange' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->route('events.create')->withInput()->withErrors($validator);
        }

        $user = auth()->user();
        $lomba = new lomba;
        $lomba->user_id = $user->id;
        $lomba->fullname = $request->fullname;
        $lomba->grade = $request->grade;
        $lomba->expertise = $request->expertise;
        $lomba->event_select = $request->event_select;
        $lomba->event_field = $request->event_field;
        $lomba->event_type = $request->event_type;
        $lomba->daterange = $request->daterange;
        $lomba->country = $request->country;
        $lomba->state = $request->state;
        $lomba->city = $request->city;
        
        $lomba->save();
        
        return redirect()->route('events.show')->with('success', 'Event Registered Successfully!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function show(Lomba $lomba)
    {
        $userId = auth()->user()->id;
        $lombas = Lomba::where('user_id', $userId)->get();

        $user = auth()->user();
        $profile = $user ? $user->profile : null;

        return view('events.eventsummary',[
            'title' => "Event Summary",
            'lombas' => Lomba::all(),
            'lombas' => $lombas,
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id, $id)
    {
        //
        $user = Auth::user();
        if ($user->id != $user_id) {
            return redirect()->back()->with('error', 'User does not match');
        }

        $lomba = Lomba::where('user_id', $user_id)
                             ->where('id', $id)
                             ->firstOrFail();

        $profile = $user ? $user->profile : null;

        return view('events.edit', compact('lomba'), [
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLombaRequest  $request
     * @param  \App\Models\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLombaRequest $request, Lomba $lomba)
    {
        $rules = [
            'fullname' => 'required|min:5|max:255',
            'grade' => 'required',
            'expertise' => 'required',
            'event_select' => 'required',
            'event_field' => 'required',
            'event_type' => 'required',
            'daterange' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->route('events.edit', ['user_id' => $lomba->user_id, 'id' => $lomba->id])->withInput()->withErrors($validator);
        }

        $user = auth()->user();
        $lomba->user_id = $user->id;
        $lomba->fullname = $request->fullname;
        $lomba->grade = $request->grade;
        $lomba->expertise = $request->expertise;
        $lomba->event_select = $request->event_select;
        $lomba->event_field = $request->event_field;
        $lomba->event_type = $request->event_type;
        $lomba->daterange = $request->daterange;
        $lomba->country = $request->country;
        $lomba->state = $request->state;
        $lomba->city = $request->city;
        
        $lomba->save();
        
        return redirect()->route('events.show')->with('success', 'Event Registration Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $id)
    {
        // Temukan lomba berdasarkan user_id dan id lomba
        $lomba = Lomba::where('user_id', $user_id)
                                ->where('id', $id)
                                ->firstOrFail();
        
        // Hapus lomba dari database
        $lomba->delete();

        return redirect()->route('events.show')->with('success', 'Event Registration Deleted Successfully.');
    }
}
