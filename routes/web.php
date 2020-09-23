<?php

use App\Http\Controllers\AdminController;
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


/*
|--------------------------------------------------------------------------
| Main Routes
|--------------------------------------------------------------------------
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
Route::group(['prefix'=>'profile','middleware'=>'UserMiddleware'],function() {
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



/*
|--------------------------------------------------------------------------
| Admins Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix'=>'admin/profile', 'middleware'=>'AdminMiddleware'],function() {
    Route::get('/',[AdminController::class, 'index'])->name('admin-profile.index'); // Show Company Profile
    Route::get('/edit',[AdminController::class, 'edit'])->name('admin-profile.edit');  // Show Edit Company profile page
    Route::patch('/',[AdminController::class, 'update'])->name('admin-profile.update'); // Update the Company profile
    Route::patch('/password/update',[AdminController::class, 'updatePassword'])->name('admin-password.update'); // Change Company Password
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
//Route::group(['prefix'=>'application'],function() {
//    Route::get('/',);
//
//});

/*
|--------------------------------------------------------------------------
| Test Routes
|--------------------------------------------------------------------------
*/

Route::get('/Application', function (){
    return view('Application.master');
})->name('Application');




//Route::resource('/resume',ResumeController::class);
