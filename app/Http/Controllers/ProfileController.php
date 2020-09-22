<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
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
     * Show the form for editing profile resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit',['user'=>$user]);
    }

    /**
     * Update Profile Information in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        if($user->email == request('email'))
        {
            $this->validate($request, [
                'name' => 'required',
//                'email' => 'required|email|unique:users',
                'birth_date' => 'nullable|date',
                'address' => 'nullable',
                'phone' => 'nullable|digits:11',
            ]);
        }
        else
        {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'birth_date' => 'nullable|date',
                'address' => 'nullable',
                'phone' => 'nullable|digits:11',
            ]);
            $user->email = $request->email;
        }


        $user->name = $request->name;
        $user->birth_date = request('birth_date');
        $user->address = request('address');
        $user->phone = request('phone');
        $user->save();

        return redirect()->route('profile.index')->with(['success' => 'Profile Edited Successfully']);
    }


    /**
     * Update Profile Information in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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
