<?php

namespace App\Http\Controllers;

use App\Models\User;
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
     * @return \Illuminate\Http\Response
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
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
                'password' => 'required|min:6|confirmed',
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
                'password' => 'required|min:6|confirmed',
                'address' => 'nullable',
                'phone' => 'nullable|digits:11',
            ]);
            $user->email = $request->email;
        }


        $user->name = $request->name;
        $user->birth_date = request('birth_date');
        $user->password = bcrypt($request->password);
        $user->address = request('address');
        $user->phone = request('phone');
        $user->save();

        return redirect()->route('profile.index')->with(['success' => 'Profile Edited Successfully']);

    }

}
