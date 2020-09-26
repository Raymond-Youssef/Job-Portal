<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\CompanyAdminController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplicantAdminController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
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


/*
|--------------------------------------------------------------------------
| Main Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/search', function () {
    return view('search.search');
})->name('search');

/*
|--------------------------------------------------------------------------
| Applicants Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix'=>'profile'],function() {
    Route::get('/',[ProfileController::class, 'index'])->name('profile.index'); // Show user Profile
    Route::get('/edit',[ProfileController::class, 'edit'])->name('profile.edit');  // Show Edit profile page
    Route::patch('/',[ProfileController::class, 'update'])->name('profile.update'); // Update the user profile
    Route::patch('/password/update',[ProfileController::class, 'updatePassword'])->name('password.update'); // Change Password
    Route::post('/resume/add',[ResumeController::class,'store'])->name('resume.store'); // Add new resume
    Route::delete('/resume/{resume}',[ResumeController::class, 'destroy'])->name('resume.destroy'); // Remove a resume
    Route::patch('/resume/{resume}', [ResumeController::class,'setDefault'])->name('resume.update'); // Update default resume
});

/*
|--------------------------------------------------------------------------
| Company Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix'=>'company/profile', 'middleware'=>'CompanyMiddleware'],function() {
    Route::get('/',[CompanyProfileController::class, 'index'])->name('company-profile.index'); // Show Company Profile
    Route::get('/edit',[CompanyProfileController::class, 'edit'])->name('company-profile.edit');  // Show Edit Company profile page
    Route::patch('/',[CompanyProfileController::class, 'update'])->name('company-profile.update'); // Update the Company profile
    Route::patch('/password/update',[CompanyProfileController::class, 'updatePassword'])->name('company-password.update'); // Change Company Password
});

Route::group(['prefix'=>'company'],function (){
    Route::resource('/job', JobController::class);
    Route::post('/job/application/',[JobController::class, 'updateStatus'])->name('application.updateStatus'); // Change application status
});


/*
|--------------------------------------------------------------------------
| Admins Routes
|--------------------------------------------------------------------------
*/
// Admin Profile Routes
Route::group(['prefix'=>'admin/profile', 'middleware'=>'AdminMiddleware'],function() {
    Route::get('/',[AdminController::class, 'index'])->name('admin-profile.index'); // Show Company Profile
    Route::get('/edit',[AdminController::class, 'edit'])->name('admin-profile.edit');  // Show Edit Company profile page
    Route::patch('/',[AdminController::class, 'update'])->name('admin-profile.update'); // Update the Company profile
    Route::patch('/password/update',[AdminController::class, 'updatePassword'])->name('admin-password.update'); // Change Company Password
});

// Dashboard routes
Route::group(['prefix'=>'/dashboard','middleware'=>'AdminMiddleware'],function(){
    Route::get('/', function() {
        return view('dashboard.index');
    })->name('dashboard')->middleware('auth');
    Route::resource('/applicant', ApplicantAdminController::class)->except(['create','store']);
    Route::post('/applicant/verify/{applicant}', [ApplicantAdminController::class, 'verify'])->name('applicant.verify');
    Route::post('/applicant/block/{applicant}', [ApplicantAdminController::class, 'block'])->name('applicant.block');
    Route::resource('/company', CompanyAdminController::class)->except(['create','store']);
    Route::post('/company/verify/{company}', [CompanyAdminController::class, 'verify'])->name('company.verify');
    Route::post('/company/block/{company}', [CompanyAdminController::class, 'block'])->name('company.block');
});

/*
|--------------------------------------------------------------------------
| Search Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix'=>'search', 'middleware'=>'auth'],function() {
    Route::get('/jobs', [SearchController::class,'jobs'])->name('search.jobs');
    Route::get('/jobs/show/{job}', [SearchController::class,'showJob'])->name('search.jobs.show');
    Route::get('/companies', [SearchController::class, 'companies'])->name('search.companies');
    Route::get('/companies/{company}',[SearchController::class, 'showCompany'])->name('search.companies.show');
    Route::get('/applicants', [SearchController::class, 'applicants'])->name('search.applicants');
    Route::get('/applicants/{applicant}',[SearchController::class, 'showApplicant'])->name('search.applicants.show');
});


/*
|--------------------------------------------------------------------------
| Images Processing
|--------------------------------------------------------------------------
*/
Route::post('image/store',[ImageController::class, 'store'])->name('image.store'); // Change Profile Picture


/*
|--------------------------------------------------------------------------
| Applications Routes
|--------------------------------------------------------------------------
*/

Route::resource('/application', ApplicationsController::class)->except('create');
Route::get('/application/create/{job}',[ApplicationsController::class, 'create'])->name('application.create');



