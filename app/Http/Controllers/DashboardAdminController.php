<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Sertifikat;
use App\Charts\AchievementsTotalChart;
use App\Charts\AchievementsTypeTotalChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AchievementsTotalChart $achievementsTotalChart, AchievementsTypeTotalChart $achievementsTypeTotalChart)
    {
        $user = auth()->user();

        $totalAcademicCount = Sertifikat::where('event_field', 'academic')
            ->count();

        $totalNonAcademicCount = Sertifikat::where('event_field', 'non academic')
            ->count();
        
        $totalCompetitionActivities = Sertifikat::where('role', 'Competition Activities')
            ->count();
        $totalNonCompetitionActivities = Sertifikat::where('role', 'Non-Competition Activities')
            ->count();

        $topStudents = User::select('users.fullname', DB::raw('COUNT(sertifikats.id) as sertifikat_count'))
            ->join('sertifikats', 'users.id', '=', 'sertifikats.user_id')
            ->groupBy('users.fullname')
            ->orderBy('sertifikat_count', 'desc')
            ->take(3)
            ->get();

        return view('dashboards.dashboardadmin', [
            'title' => 'Dashboard',
            'achievementsTotalChart' => $achievementsTotalChart->build(),
            'achievementsTypeTotalChart' => $achievementsTypeTotalChart->build(),
            'totalAcademicCount' => $totalAcademicCount,
            'totalNonAcademicCount' => $totalNonAcademicCount,
            'totalCompetitionActivities' => $totalCompetitionActivities,
            'totalNonCompetitionActivities' => $totalNonCompetitionActivities,
            'topStudents' => $topStudents,
            'users' => User::all(),
            "users" => $user
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
