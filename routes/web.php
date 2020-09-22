<?php

use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\ResumeController;
//use App\Http\Controllers\ImageController;
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

Route::get('/', function () {
    return view('landing-page.master');
})->name('landing-page');

Route::get('/profile', function (){
    return view('profile.master');
})->name('profile');

Route::get('/searching', function () {
    return view('searching.search');
})->name('searching');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/test', [ProfileController::class,'index']
//);





//Route::resource('/resume',ResumeController::class);
//Route::resource('/image',ImageController::class);

Route::get('/profile',[ProfileController::class, 'index'])->name('profile.index'); // Show user Profile
Route::get('/profile/edit',[ProfileController::class, 'edit'])->name('profile.edit');  // Show Edit profile page
Route::patch('/profile',[ProfileController::class, 'edit'])->name('profile.update'); // Update the user profile
