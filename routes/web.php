<?php

use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/searching', function () {
    return view('searching.search');
})->name('searching');

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix'=>'profile'],function() {
    Route::get('/',[ProfileController::class, 'index'])->name('profile.index'); // Show user Profile
    Route::get('/edit',[ProfileController::class, 'edit'])->name('profile.edit');  // Show Edit profile page
    Route::patch('/',[ProfileController::class, 'update'])->name('profile.update'); // Update the user profile
    Route::post('image/store',[ImageController::class, 'store'])->name('image.store'); // Change Profile Picture
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
Route::group(['prefix'=>'company/profile'],function() {
    Route::get('/',[CompanyProfileController::class, 'index'])->name('companyProfile.index'); // Show Company Profile
    Route::get('/edit',[CompanyProfileController::class, 'edit'])->name('companyProfile.edit');  // Show Edit Company profile page
    Route::patch('/',[CompanyProfileController::class, 'update'])->name('companyProfile.update'); // Update the Company profile
//    Route::post('image/store',[ImageController::class, 'store'])->name('image.store'); // Change Profile Picture
//    Route::patch('/password/update',[ProfileController::class, 'updatePassword'])->name('password.update'); // Change Password
//    Route::post('/resume/add',[ResumeController::class,'store'])->name('resume.store'); // Add new resume
//    Route::delete('/resume/{resume}',[ResumeController::class, 'destroy'])->name('resume.destroy'); // Remove a resume
//    Route::patch('/resume/{resume}', [ResumeController::class,'setDefault'])->name('resume.update'); // Update default resume
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix'=>'application'],function() {
    Route::get('/',);

});

/*
|--------------------------------------------------------------------------
| Test Routes
|--------------------------------------------------------------------------
*/

Route::get('/Application', function (){
    return view('Application.master');
})->name('Application');




//Route::resource('/resume',ResumeController::class);
