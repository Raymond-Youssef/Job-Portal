<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AdminMiddleware');
    }

    /**
     * Display Admin Profile
     *
     * @return View
     */
    public function index()
    {
        $admin = Auth::user();
        $image = $admin->image;
        return view('admin-profile.master',[
            'admin'=>$admin,
            'image' => $image]);
    }


    /**
     * Show the form for editing profile.
     *
     * @return View
     */
    public function edit()
    {
        $admin = Auth::user();
        return view('admin-profile.edit',['admin'=>$admin]);
    }


    /**
     * Update Admin Profile Information in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request)
    {
        $admin = Auth::user();
        if($admin->email == request('email'))
        {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                //'email' => 'required|email|unique:users',
                'creation_date' => 'nullable|date',
                'city' => 'nullable|string|max:255',
                'country' => 'nullable|string|max:255',
                'phone' => 'nullable|digits:11',
            ]);
        }
        else
        {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|string|max:255',
                'creation_date' => 'nullable|date',
                'city' => 'nullable|string|max:255',
                'country' => 'nullable|string|max:255',
                'phone' => 'nullable|digits:11',
            ]);
            $admin->email = $request->email;
        }


        $admin->name = $request->name;
        $admin->birth_date = request('creation_date');
        $admin->city = request('city');
        $admin->country = request('country');
        $admin->phone = request('phone');
        $admin->save();

        return redirect()->route('admin-profile.index')->with(['success' => 'Admin Profile Edited Successfully']);
    }

    /**
     * Update Password in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function updatePassword(Request $request)
    {
        $admin = Auth::user();
        $this->validate($request, [
            'password' => 'required|confirmed|min:8|string'
        ]);
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->back()->with(['success' => 'Password Updated Successfully!']);
    }

}
