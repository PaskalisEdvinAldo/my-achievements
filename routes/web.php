<?php

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ForgotPasswordFictionController;
use App\Http\Controllers\ForgotPasswordPetController;
use App\Http\Controllers\ForgotPasswordPlaceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInfoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/storage-link', function () {
//     $targetFolder = storage_path('app/public');
//     $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
//     symlink($targetFolder, $linkFolder);
// });

Route::get('/', function () {
        return view('landingpage');
    })->name('landingpage');

Route::get('/about', function () {
        return view('about');
    })->name('about');

//registrasi
Route::get('/register', [RegisterController::class, 'index'])->name('register.index')->middleware('guest');
Route::post('/register/validation', [RegisterController::class, 'validation'])->name('register.validation');
Route::post('/register/clearAuthCookie', [RegisterController::class, 'clearAuthCookie'])->name('register.clearAuthCookie');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout']);

//dashboard
Route::get('/dashboards', [DashboardController::class, 'index'])->name('dashboards.index')->middleware('auth');
Route::get('/dashboardadmins', [DashboardAdminController::class, 'index'])->name('dashboardadmins.index')->middleware('auth');

//forgot password
Route::get('/forgotpassword', [ForgotPasswordController::class, 'index'])->name('forgotpassword.index')->middleware('guest');
Route::post('/forgotpassword', [ForgotPasswordController::class, 'validation'])->name('forgotpassword.validation');
Route::get('/forgotpasswordfiction', [ForgotPasswordFictionController::class, 'index'])->name('forgotpasswordfiction.index')->middleware('guest');
Route::post('/forgotpasswordfiction', [ForgotPasswordFictionController::class, 'validationFiction'])->name('forgotpasswordfiction.validationFiction');
Route::get('/forgotpasswordpet', [ForgotPasswordPetController::class, 'index'])->name('forgotpasswordpet.index')->middleware('guest');
Route::post('/forgotpasswordpet', [ForgotPasswordPetController::class, 'validationPet'])->name('forgotpasswordpet.validationPet');
Route::get('/forgotpasswordplace', [ForgotPasswordPlaceController::class, 'index'])->name('forgotpasswordplace.index')->middleware('guest');
Route::post('/forgotpasswordplace', [ForgotPasswordPlaceController::class, 'validationPlace'])->name('forgotpasswordplace.validationPlace');

//reset password
Route::get('/resetpassword', [ResetPasswordController::class, 'index'])->name('resetpassword.index')->middleware('guest');
Route::post('/resetpassword', [ResetPasswordController::class, 'reset'])->name('resetpassword.reset');

//profile
Route::get('/profiles', [UserController::class, 'index'])->name('profiles.index')->middleware('auth');
Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profiles.create')->middleware('auth');
Route::get('/profiles/create', [UserController::class, 'create'])->name('profiles.create')->middleware('auth');
Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');
Route::get('/profiles/{user_id}/edit', [ProfileController::class, 'edit'])->name('profiles.edit')->middleware('auth');
Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update')->middleware('auth');

//user information
Route::get('/users', [UserInfoController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/users/{id}/edit', [UserInfoController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user}', [UserInfoController::class, 'update'])->name('users.update')->middleware('auth');

//events
Route::get('/events', [LombaController::class, 'index'])->name('events.index')->middleware('auth');
Route::get('/events/create', [LombaController::class, 'create'])->name('events.create')->middleware('auth');
Route::post('/events', [LombaController::class, 'store'])->name('events.store');
Route::get('/events/{user_id}/edit/{id}', [LombaController::class, 'edit'])->name('events.edit')->middleware('auth');
Route::put('/events/{lomba}', [LombaController::class, 'update'])->name('events.update')->middleware('auth');
Route::get('/events/show', [LombaController::class, 'show'])->name('events.show')->middleware('auth');
Route::delete('/events/{user_id}/{id}', [LombaController::class, 'destroy'])->name('events.destroy')->middleware('auth');

//curriculum vitae
Route::get('/curriculumvitaes', [ResumeController::class, 'index'])->name('curriculumvitaes.index')->middleware('auth');

//work experiences
Route::get('/curriculumvitaes/createWork', [ResumeController::class, 'createWork'])->name('curriculumvitaes.createWork')->middleware('auth');
Route::post('/curriculumvitaes/storeWork', [ResumeController::class, 'storeWork'])->name('curriculumvitaes.storeWork');
Route::get('/curriculumvitaes/{user_id}/editWork/{id}', [ResumeController::class, 'editWork'])->name('curriculumvitaes.editWork')->middleware('auth');
Route::put('/curriculumvitaes/{work}/updateWork', [ResumeController::class, 'updateWork'])->name('curriculumvitaes.updateWork')->middleware('auth');
Route::get('/curriculumvitaes/show', [ResumeController::class, 'show'])->name('curriculumvitaes.show')->middleware('auth');
Route::delete('/curriculumvitaes/{user_id}/{type}/{id}', [ResumeController::class, 'destroy'])->name('curriculumvitaes.destroy')->middleware('auth');

//skills & tools
Route::get('/curriculumvitaes/createSkill', [ResumeController::class, 'createSkill'])->name('curriculumvitaes.createSkill')->middleware('auth');
Route::post('/curriculumvitaes/storeSkill', [ResumeController::class, 'storeSkill'])->name('curriculumvitaes.storeSkill');
Route::get('/curriculumvitaes/{user_id}/editSkill/{id}', [ResumeController::class, 'editSkill'])->name('curriculumvitaes.editSkill')->middleware('auth');
Route::put('/curriculumvitaes/{skill}/updateSkill', [ResumeController::class, 'updateSkill'])->name('curriculumvitaes.updateSkill')->middleware('auth');

//educations
Route::get('/curriculumvitaes/createEducation', [ResumeController::class, 'createEducation'])->name('curriculumvitaes.createEducation')->middleware('auth');
Route::post('/curriculumvitaes/storeEdu', [ResumeController::class, 'storeEdu'])->name('curriculumvitaes.storeEdu');
Route::get('/curriculumvitaes/{user_id}/editEdu/{id}', [ResumeController::class, 'editEdu'])->name('curriculumvitaes.editEdu')->middleware('auth');
Route::put('/curriculumvitaes/{edu}/updateEdu', [ResumeController::class, 'updateEdu'])->name('curriculumvitaes.updateEdu')->middleware('auth');

//languages
Route::get('/curriculumvitaes/createLanguage', [ResumeController::class, 'createLanguage'])->name('curriculumvitaes.createLanguage')->middleware('auth');
Route::post('/curriculumvitaes/storeLanguage', [ResumeController::class, 'storeLanguage'])->name('curriculumvitaes.storeLanguage');
Route::get('/curriculumvitaes/{user_id}/editLanguage/{id}', [ResumeController::class, 'editLanguage'])->name('curriculumvitaes.editLanguage')->middleware('auth');
Route::put('/curriculumvitaes/{language}/updateLanguage', [ResumeController::class, 'updateLanguage'])->name('curriculumvitaes.updateLanguage')->middleware('auth');

//certificate
Route::get('/certificates', [SertifikatController::class, 'index'])->name('certificates.index')->middleware('auth');
Route::post('/certificates', [SertifikatController::class, 'store']);
Route::get('/certificates/{user_id}/edit/{id}', [SertifikatController::class, 'edit'])->name('certificates.edit')->middleware('auth');
Route::put('/certificates/{sertifikat}', [SertifikatController::class, 'update'])->name('certificates.update')->middleware('auth');
Route::get('/storage/user-certificates/{filename}', [SertifikatController::class, 'showCertificate'])->middleware('auth');
Route::delete('/certificates/{user_id}/{id}', [SertifikatController::class, 'destroy'])->name('certificates.destroy')->middleware('auth');

//summary
Route::get('/summarys', [SummaryController::class, 'index'])->name('summarys.index')->middleware('auth');