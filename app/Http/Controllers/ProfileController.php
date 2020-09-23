<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $user = Auth::user();
        $resumes = $user->resumes;
        $image = $user->image;
        return view('profile.master',[
            'user'=>$user,
            'resumes'=>$resumes,
            'image' => $image]);
    }


    /**
     * Show the form for editing profile.
     * @return View
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit',['user'=>$user]);
    }

    /**
     * Update Profile Information in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        if($user->email == request('email'))
        {
            $this->validate($request, [
                'name' => 'required',
                //'email' => 'required|email|unique:users',
                'birth_date' => 'nullable|date',
                'city' => 'nullable',
                'country' => 'nullable',
                'phone' => 'nullable|digits:11',
            ]);
        }
        else
        {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'birth_date' => 'nullable|date',
                'city' => 'nullable',
                'country' => 'nullable',
                'phone' => 'nullable|digits:11',
            ]);
            $user->email = $request->email;
        }


        $user->name = $request->name;
        $user->birth_date = request('birth_date');
        $user->city = request('city');
        $user->country = request('country');
        $user->phone = request('phone');
        $user->save();

        return redirect()->route('profile.index')->with(['success' => 'Profile Edited Successfully']);
    }


    /**
     * Update Profile Information in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'password' => 'required|confirmed|min:8'
        ]);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with(['success' => 'Password updated successfully!']);
    }

}
