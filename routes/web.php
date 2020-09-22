<?php

use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ImageController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/test', [ProfileController::class,'index']
//);





//Route::resource('/resume',ResumeController::class);
//Route::resource('/image',ImageController::class);


// Profile Controller
Route::group(['prefix'=>'profile'],function() {
    Route::get('/',[ProfileController::class, 'index'])->name('profile.index'); // Show user Profile
    Route::get('/edit',[ProfileController::class, 'edit'])->name('profile.edit');  // Show Edit profile page
    Route::patch('/',[ProfileController::class, 'update'])->name('profile.update'); // Update the user profile
    Route::post('image/store',[ImageController::class, 'store'])->name('image.store'); // Change Profile Picture
    Route::patch('/password/edit',[ProfileController::class, 'passwordEdit'])->name('password.store'); // Change Password
});
