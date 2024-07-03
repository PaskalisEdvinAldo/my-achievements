<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEduRequest;
use App\Http\Requests\StoreLanguageRequest;
use App\Models\Resume;
use App\Models\User;
use App\Models\Profile;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\StoreWorkRequest;
use App\Http\Requests\UpdateEduRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Requests\UpdateWorkRequest;
use App\Models\Edu;
use App\Models\Language;
use App\Models\Sertifikat;
use App\Models\Skill;
use App\Models\Work;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userId = auth()->user()->id;
        $resumes = Resume::where('user_id', $userId)->get();
        $sertifikat = Sertifikat::where('user_id', $userId)->get();
        $works = Work::where('user_id', $userId)->get();
        $skills = Skill::where('user_id', $userId)->get();
        $edus = Edu::where('user_id', $userId)->get();
        $languages = Language::where('user_id', $userId)->get();

        $user = auth()->user();
        $profile = $user ? $user->profile : null;

        return view('curriculumvitaes.cv',[
            'title' => 'Curriculum Vitae',
            'users' => User::all(),
            'profiles' => Profile::all(),
            'resumes' => Resume::all(),
            'sertifikats' => Sertifikat::all(),
            'works' => Work::all(),
            'skills' => Skill::all(),
            'edus' => Edu::all(),
            'languages' => Language::all(),
            'languages' => $languages,
            'edus' => $edus,
            'skills' => $skills,
            'works' => $works,
            'sertifikats' => $sertifikat,
            "resumes" => $resumes,
            "users" => $user,
            "profiles" => $profile
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createWork()
    {
        //
        $user = auth()->user();
        $profile = $user ? $user->profile : null;

        return view('curriculumvitaes.creatework',[
            'title' => 'Work Experience',
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }

    public function createSkill()
    {
        //
        $user = auth()->user();
        $profile = $user ? $user->profile : null;

        return view('curriculumvitaes.createskill',[
            'title' => 'Skills & Tools',
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }
    
    public function createEducation()
    {
        //
        $user = auth()->user();
        $profile = $user ? $user->profile : null;

        return view('curriculumvitaes.createedu',[
            'title' => 'Educations',
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }
    
    public function createLanguage()
    {
        //
        $user = auth()->user();
        $profile = $user ? $user->profile : null;

        return view('curriculumvitaes.createlanguage',[
            'title' => 'Languages',
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function storeWork(StoreWorkRequest $request)
    {
        //
        $rules = [
            'company' => 'required|max:1000',
            'position' => 'required|max:1000',
            'start_tenure' => 'required|date',
            'end_tenure' => 'required|date',
            'job_desc' => 'required',
            'achievement_desc' => 'nullable',
            'tech' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return redirect()->route('curriculumvitaes.createWork')->withInput()->withErrors($validator);
        }

        $user = auth()->user();

        $work = new Work;
        $work->user_id = $user->id;
        $work->company = $request->company;
        $work->position = $request->position;
        $work->start_tenure = $request->start_tenure;
        $work->end_tenure = $request->end_tenure;
        $work->job_desc = strip_tags($request->job_desc);
        $work->achievement_desc = strip_tags($request->achievement_desc);
        $work->tech = $request->tech;

        $existingWork = Work::where([
            'user_id' => auth()->user()->id,
            'company' => $request->company,
            'position' => $request->position,
        ])->first();
    
        if ($existingWork) {
            return redirect()->route('curriculumvitaes.createWork')->withInput()->with('error', 'Company and Position already exist!');
        }

        $work->save();

        return redirect()->route('curriculumvitaes.show')->with('success', 'Work Experiences Added Successfully!');
    }

    public function storeSkill(StoreSkillRequest $request)
    {
        //
        $rules = [
            'expertise_field' => 'required',
            'tools' => 'required',
            'other_skills' => 'nullable',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return redirect()->route('curriculumvitaes.createSkill')->withInput()->withErrors($validator);
        }

        $user = auth()->user();

        $skill = new Skill;
        $skill->user_id = $user->id;
        $skill->expertise_field = $request->expertise_field;
        $skill->tools = $request->tools;
        $skill->other_skills = $request->other_skills;

        $existingSkill = Skill::where([
            'user_id' => auth()->user()->id,
            'expertise_field' => $request->expertise_field,
        ])->first();
    
        if ($existingSkill) {
            return redirect()->route('curriculumvitaes.createSkill')->withInput()->with('error', 'Skill already exist!');
        }

        $skill->save();

        return redirect()->route('curriculumvitaes.show')->with('success', 'Skills & Tools Added Successfully!');
    }

    public function storeEdu(StoreEduRequest $request)
    {
        //
        $rules = [
            'institution' => 'required',
            'degree' => 'required',
            'start_period' => 'required|date',
            'end_period' => 'required|date',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return redirect()->route('curriculumvitaes.createEducation')->withInput()->withErrors($validator);
        }

        $user = auth()->user();

        $edu = new Edu;
        $edu->user_id = $user->id;
        $edu->institution = $request->institution;
        $edu->degree = $request->degree;
        $edu->start_period = $request->start_period;
        $edu->end_period = $request->end_period;

        $existingEdu = Edu::where([
            'user_id' => auth()->user()->id,
            'institution' => $request->institution,
            'degree' => $request->degree,
        ])->first();
    
        if ($existingEdu) {
            return redirect()->route('curriculumvitaes.createEducation')->withInput()->with('error', 'Institution and Degree already exist!');
        }

        $edu->save();

        return redirect()->route('curriculumvitaes.show')->with('success', 'Educations Added Successfully!');
    }

    public function storeLanguage(StoreLanguageRequest $request)
    {
        //
        $rules = [
            'language' => 'required',
            'capability' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return redirect()->route('curriculumvitaes.createLanguage')->withInput()->withErrors($validator);
        }

        $user = auth()->user();

        $language = new Language;
        $language->user_id = $user->id;
        $language->language = $request->language;
        $language->capability = $request->capability;

        $existingLanguage = Language::where([
            'user_id' => auth()->user()->id,
            'language' => $request->language,
        ])->first();
    
        if ($existingLanguage) {
            return redirect()->route('curriculumvitaes.createLanguage')->withInput()->with('error', 'Language already exist!');
        }

        $language->save();

        return redirect()->route('curriculumvitaes.show')->with('success', 'Curriculum Vitae Details Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $userId = auth()->user()->id;
        $resumes = Resume::where('user_id', $userId)->get();
        $works = Work::where('user_id', $userId)->get();
        $skills = Skill::where('user_id', $userId)->get();
        $edus = Edu::where('user_id', $userId)->get();
        $languages = Language::where('user_id', $userId)->get();

        $user = auth()->user();
        $profile = $user ? $user->profile : null;

        return view('curriculumvitaes.cvsummary', [
            'title' => 'Work Experience',
            'users' => User::all(),
            'profiles' => Profile::all(),
            'resumes' => Resume::all(),
            'works' => Work::all(),
            'skills' => Skill::all(),
            'edus' => Edu::all(),
            'languages' => Language::all(),
            "languages" => $languages,
            "edus" => $edus,
            "skills" => $skills,
            "works" => $works,
            "resumes" => $resumes,
            "users" => $user,
            "profiles" => $profile
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function editWork($user_id, $id)
    {
        //
        $user = Auth::user();
        if ($user->id != $user_id) {
            return redirect()->back()->with('error', 'User does not match');
        }

        $work = Work::where('user_id', $user_id)
                             ->where('id', $id)
                             ->firstOrFail();
                             $user = auth()->user();
        
        $profile = $user ? $user->profile : null;

        return view('curriculumvitaes.editwork', compact('work'),[
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }
    
    public function editSkill($user_id, $id)
    {
        //
        $user = Auth::user();
        if ($user->id != $user_id) {
            return redirect()->back()->with('error', 'User does not match');
        }

        $skill = Skill::where('user_id', $user_id)
                             ->where('id', $id)
                             ->firstOrFail();
                             $user = auth()->user();
        
        $profile = $user ? $user->profile : null;

        return view('curriculumvitaes.editskill', compact('skill'),[
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }
    public function editEdu($user_id, $id)
    {
        //
        $user = Auth::user();
        if ($user->id != $user_id) {
            return redirect()->back()->with('error', 'User does not match');
        }

        $edu = Edu::where('user_id', $user_id)
                             ->where('id', $id)
                             ->firstOrFail();
                             $user = auth()->user();
        
        $profile = $user ? $user->profile : null;

        return view('curriculumvitaes.editedu', compact('edu'),[
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }
    public function editLanguage($user_id, $id)
    {
        //
        $user = Auth::user();
        if ($user->id != $user_id) {
            return redirect()->back()->with('error', 'User does not match');
        }

        $language = Language::where('user_id', $user_id)
                             ->where('id', $id)
                             ->firstOrFail();
                             $user = auth()->user();
        
        $profile = $user ? $user->profile : null;

        return view('curriculumvitaes.editlanguage', compact('language'),[
            'users' => User::all(),
            'profiles' => Profile::all(),
            "users" => $user,
            "profiles" => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateWork(UpdateWorkRequest $request, Work $work)
    {
        //
        $rules = [
            'company' => 'required|max:1000',
            'position' => 'required|max:1000',
            'start_tenure' => 'required|date',
            'end_tenure' => 'required|date',
            'job_desc' => 'required',
            'achievement_desc' => 'nullable',
            'tech' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return redirect()->route('curriculumvitaes.editWork', ['user_id' => $work->user_id, 'id' => $work->id])->withInput()->withErrors($validator);
        }

        $user = auth()->user();
        $work->user_id = $user->id;
        $work->company = $request->company;
        $work->position = $request->position;
        $work->start_tenure = $request->start_tenure;
        $work->end_tenure = $request->end_tenure;
        $work->job_desc = strip_tags($request->job_desc);
        $work->achievement_desc = strip_tags($request->achievement_desc);
        $work->tech = $request->tech;

        $work->save();

        return redirect()->route('curriculumvitaes.show')->with('success', 'Work Experiences Updated Successfully!');
    }

    public function updateSkill(UpdateSkillRequest $request, Skill $skill)
    {
        //
        $rules = [
            'expertise_field' => 'required',
            'tools' => 'required',
            'other_skills' => 'nullable',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return redirect()->route('curriculumvitaes.editSkill', ['user_id' => $skill->user_id, 'id' => $skill->id])->withInput()->withErrors($validator);
        }

        $user = auth()->user();
        $skill->user_id = $user->id;
        $skill->expertise_field = $request->expertise_field;
        $skill->tools = $request->tools;
        $skill->other_skills = $request->other_skills;

        $skill->save();

        return redirect()->route('curriculumvitaes.show')->with('success', 'Skills & Tools Updated Successfully!');
    }

    public function updateEdu(UpdateEduRequest $request, Edu $edu)
    {
        //
        $rules = [
            'institution' => 'required',
            'degree' => 'required',
            'start_period' => 'required|date',
            'end_period' => 'required|date',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return redirect()->route('curriculumvitaes.editEdu', ['user_id' => $edu->user_id, 'id' => $edu->id])->withInput()->withErrors($validator);
        }

        $user = auth()->user();
        $edu->user_id = $user->id;
        $edu->institution = $request->institution;
        $edu->degree = $request->degree;
        $edu->start_period = $request->start_period;
        $edu->end_period = $request->end_period;

        $edu->save();

        return redirect()->route('curriculumvitaes.show')->with('success', 'Educations Updated Successfully!');
    }

    public function updateLanguage(UpdateLanguageRequest $request, Language $language)
    {
        //
        $rules = [
            'language' => 'required',
            'capability' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return redirect()->route('curriculumvitaes.editLanguage', ['user_id' => $language->user_id, 'id' => $language->id])->withInput()->withErrors($validator);
        }

        $user = auth()->user();
        $language->user_id = $user->id;
        $language->language = $request->language;
        $language->capability = $request->capability;

        $language->save();

        return redirect()->route('curriculumvitaes.show')->with('success', 'Languages Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $type, $id)
    {
        switch ($type) {
            case 'work':
                $this->destroyWork($user_id, $id);
                return redirect()->route('curriculumvitaes.show')->with('success', 'Work Experiences Deleted Successfully.');
                break;
            case 'skill':
                $this->destroySkill($user_id, $id);
                return redirect()->route('curriculumvitaes.show')->with('success', 'Skills & Tools Deleted Successfully.');
                break;
            case 'education':
                $this->destroyEducation($user_id, $id);
                return redirect()->route('curriculumvitaes.show')->with('success', 'Educations Deleted Successfully.');
                break;
            case 'language':
                $this->destroyLanguage($user_id, $id);
                return redirect()->route('curriculumvitaes.show')->with('success', 'Languages Deleted Successfully.');
                break;
            default:
                // Handle invalid type
                return redirect()->back()->with('error', 'Invalid data type');
        }
    }

    public function destroyWork($user_id, $id)
    {
        // Temukan resume berdasarkan user_id dan id resume
        $work = Work::where('user_id', $user_id)
                                ->where('id', $id)
                                ->firstOrFail();
        
        // Hapus resume dari database
        $work->delete();
    }

    public function destroySkill($user_id, $id)
    {
        // Temukan resume berdasarkan user_id dan id resume
        $skill = Skill::where('user_id', $user_id)
                                ->where('id', $id)
                                ->firstOrFail();
        
        // Hapus resume dari database
        $skill->delete();
    }

    public function destroyEducation($user_id, $id)
    {
        // Temukan resume berdasarkan user_id dan id resume
        $edu = Edu::where('user_id', $user_id)
                                ->where('id', $id)
                                ->firstOrFail();
        
        // Hapus resume dari database
        $edu->delete();
    }

    public function destroyLanguage($user_id, $id)
    {
        // Temukan resume berdasarkan user_id dan id resume
        $language = Language::where('user_id', $user_id)
                                ->where('id', $id)
                                ->firstOrFail();
        
        // Hapus resume dari database
        $language->delete();
    }
}
