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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ApplicantMiddleware');
    }


    /**
     * Display Applicant profile
     *
     * @return View
     */
    public function index()
    {
        $applicant = Auth::user();
        $resumes = $applicant->resumes;
        $image = $applicant->image;
        return view('profile.index',[
            'user'=>$applicant,
            'resumes'=>$resumes,
            'image' => $image]);
    }


    /**
     * Show the form for editing profile.
     * @return View
     */
    public function edit()
    {
        $applicant = Auth::user();
        return view('profile.edit',['user'=>$applicant]);
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
        $applicant = Auth::user();
        if($applicant->email == request('email'))
        {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                //'email' => 'required|email|unique:users|max:255',
                'job_title' => 'nullable|string|max:255',
                'birth_date' => 'nullable|date',
                'city' => 'nullable|string|max:255',
                'country' => 'nullable|string|max:255',
                'phone' => 'nullable|digits:11',
                'cover_letter' => 'nullable|max:500',
            ]);
        }
        else
        {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255|string',
                'job_title' => 'nullable',
                'birth_date' => 'nullable|date',
                'city' => 'nullable',
                'country' => 'nullable',
                'phone' => 'nullable|digits:11',
                'cover_letter' => 'nullable|max:500',
            ]);
            $applicant->email = $request->email;
        }


        $applicant->name = $request->name;
        $applicant->birth_date = request('birth_date');
        $applicant->job_title = request('job_title');
        $applicant->city = request('city');
        $applicant->country = request('country');
        $applicant->phone = request('phone');
        $applicant->cover_letter = request('cover_letter');
        $applicant->save();

        return redirect()->route('profile.index')->with(['success' => 'Profile Edited Successfully']);
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
        $applicant = Auth::user();
        $this->validate($request, [
            'password' => 'required|confirmed|min:8|string'
        ]);
        $applicant->password = bcrypt($request->password);
        $applicant->save();
        return redirect()->back()->with(['success' => 'Password Updated Successfully!']);
    }

}
