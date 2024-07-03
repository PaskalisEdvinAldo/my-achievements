<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use App\Charts\AchievementsChart;
use App\Charts\AchievementsChartByYear;
use App\Charts\AchievementsTotalChart;
use App\Charts\AchievementsTypeChart;
use App\Models\Profile;
use App\Models\User;
use App\Models\Work;

class DashboardController extends Controller
{
    public function index(AchievementsChart $achievementsChart, AchievementsTypeChart $achievementsTypeChart, AchievementsChartByYear $achievementsChartByYear, AchievementsTotalChart $achievementsTotalChart){

        $user = auth()->user();
        $userId = $user->id;

        $academicCount = Sertifikat::where('user_id', $userId)
            ->where('event_field', 'academic')
            ->count();

        $nonAcademicCount = Sertifikat::where('user_id', $userId)
            ->where('event_field', 'non academic')
            ->count();
        
        $competitionActivities = Sertifikat::where('user_id', $userId)
            ->where('role', 'Competition Activities')
            ->count();
        $nonCompetitionActivities = Sertifikat::where('user_id', $userId)
            ->where('role', 'Non-Competition Activities')
            ->count();
            
        $profile = $user ? $user->profile : null;
        $sertifikat = Sertifikat::where('user_id', $userId)->get();
        $work = Work::where('user_id', $userId)->get();

        return view('dashboards.dashboard', [
            'title' => 'Dashboard',
            'achievementsChart' => $achievementsChart->build(),
            'achievementsTypeChart' => $achievementsTypeChart->build(),
            'achievementsChartByYear' => $achievementsChartByYear->build(),
            'achievementsTotalChart' => $achievementsTotalChart->build(),
            'academicCount' => $academicCount,
            'nonAcademicCount' => $nonAcademicCount,
            'competitionActivities' => $competitionActivities,
            'nonCompetitionActivities' => $nonCompetitionActivities,
            'users' => User::all(),
            'profiles' => Profile::all(),
            'works' => Work::all(),
            'sertifikats' => Sertifikat::all(),
            'works' => $work,
            'sertifikats' => $sertifikat,
            "users" => $user,
            "profiles" => $profile
        ]);
    }
}
