<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\StoreSertifikatRequest;
use App\Http\Requests\UpdateSertifikatRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $profile = $user ? $user->profile : null;

        return view('certificates.certificate', [
            'title' => 'Certificate',
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }

    public function showCertificate($filename)
    {
        $filePath = public_path('/storage/user-certificates/' . $filename);
        return response()->file($filePath);
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
     * @param  \App\Http\Requests\StoreSertifikatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSertifikatRequest $request)
    {
        //
        $rules = [
            'classification' => 'required',
            'level' => 'required',
            'role' => 'required',
            'description' => 'required',
            'achievement' => 'required',
            'event_name' => 'required|min:2',
            'event_field' => 'required',
            'event_type' => 'required',
            'event_link' => 'nullable|url',
            'event_date' => 'required',
            'certificate_date' => 'required|date',
            'country' => 'required',
            'award' => 'required|image|file|max:5120'
        ];

        
        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->route('certificates.index')->withInput()->withErrors($validator);
        }

        
        $user = auth()->user();
        $sertifikat = new Sertifikat;
        $sertifikat->user_id = $user->id;
        $sertifikat->classification = $request->classification;
        $sertifikat->level = $request->level;
        $sertifikat->role = $request->role;
        $sertifikat->description = $request->description;
        $sertifikat->achievement = $request->achievement;
        $sertifikat->event_name = $request->event_name;
        $sertifikat->event_field = $request->event_field;
        $sertifikat->event_type = $request->event_type;
        $sertifikat->event_date = $request->event_date;
        $sertifikat->event_link = $request->event_link;
        $sertifikat->certificate_date = $request->certificate_date;
        $sertifikat->country = $request->country;
        $sertifikat->state = $request->state;
        $sertifikat->city = $request->city;
        
        if($request->hasFile('award')){
            $originalFileName = $request->file('award')->getClientOriginalName();
            $filePath = $request->file('award')->storeAs('user-certificates', $originalFileName);
            $sertifikat->award = $filePath;
        }

        $existingSertifikat = Sertifikat::where([
            'user_id' => auth()->user()->id,
            'event_name' => $request->event_name,
        ])->first();
    
        if ($existingSertifikat) {
            return redirect()->route('certificates.index')->withInput()->with('error', 'Certificate already exist!');
        }

        $sertifikat->save();
        
        return redirect()->route('summarys.index')->with('success', 'Certificate Added Successfully!');
        
    }

    public function upload(StoreSertifikatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function show(Sertifikat $sertifikat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id, $id)
    {
        $user = Auth::user();
        if ($user->id != $user_id) {
            return redirect()->back()->with('error', 'User does not match');
        }

        $sertifikat = Sertifikat::where('user_id', $user_id)
                             ->where('id', $id)
                             ->firstOrFail();
                             $user = auth()->user();
        
        $profile = $user ? $user->profile : null;

        return view('certificates.editcertificate', compact('sertifikat'),[
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSertifikatRequest  $request
     * @param  \App\Models\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSertifikatRequest $request, Sertifikat $sertifikat)
    {
        //
        $rules =[
            'classification' => 'required',
            'level' => 'required',
            'role' => 'required',
            'description' => 'required',
            'achievement' => 'required',
            'event_name' => 'required|min:2',
            'event_field' => 'required',
            'event_type' => 'required',
            'event_link' => 'nullable|url',
            'event_date' => 'required',
            'certificate_date' => 'required|date',
            'country' => 'required',
            'award' => 'required|image|file|max:5120'
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return redirect()->route('certificates.edit', ['user_id' => $sertifikat->user_id, 'id' => $sertifikat->id])->withInput()->withErrors($validator);
        }

        $user = auth()->user();
        $sertifikat->user_id = $user->id;
        $sertifikat->classification = $request->classification;
        $sertifikat->level = $request->level;
        $sertifikat->role = $request->role;
        $sertifikat->description = $request->description;
        $sertifikat->achievement = $request->achievement;
        $sertifikat->event_name = $request->event_name;
        $sertifikat->event_field = $request->event_field;
        $sertifikat->event_type = $request->event_type;
        $sertifikat->event_date = $request->event_date;
        $sertifikat->event_link = $request->event_link;
        $sertifikat->certificate_date = $request->certificate_date;
        $sertifikat->country = $request->country;
        $sertifikat->state = $request->state;
        $sertifikat->city = $request->city;
        
        if ($request->hasFile('award')) {
            $originalFileName = $request->file('award')->getClientOriginalName();
            // Delete the old image
            if ($sertifikat->award) {
                Storage::delete($sertifikat->award);
            }
            // Save the new image with the original file name
            $filePath = $request->file('award')->storeAs('user-certificates', $originalFileName);
            $sertifikat->award = $filePath;
        }

        $sertifikat->save();

        return redirect()->route('summarys.index')->with('success', 'Certificate Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sertifikat  $sertifikat
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $id)
    {
        // Temukan sertifikat berdasarkan user_id dan id sertifikat
        $sertifikat = Sertifikat::where('user_id', $user_id)
                                ->where('id', $id)
                                ->firstOrFail();
        
        // Hapus sertifikat dari penyimpanan lokal jika ada
        if (Storage::exists($sertifikat->award)) {
            Storage::delete($sertifikat->award);
        }
        
        // Hapus sertifikat dari database
        $sertifikat->delete();

        return redirect()->route('summarys.index')->with('success', 'Certificate Deleted Successfully.');
    }

}
