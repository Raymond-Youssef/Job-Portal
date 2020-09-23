<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CompanyProfileController extends Controller
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
     * @return View
     */
    public function index()
    {
        $company = Auth::user();
        $image = $company->image;
        return view('company-profile.master',[
            'company'=>$company,
            'image' => $image]);
    }


    /**
     * Show the form for editing profile.
     *
     * @return View
     */
    public function edit()
    {
        $company = Auth::user();
        return view('company-profile.edit',['company'=>$company]);
    }


    /**
     * Update Company Profile Information in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request)
    {
        $company = Auth::user();
        if($company->email == request('email'))
        {
            $this->validate($request, [
                'name' => 'required',
                //'email' => 'required|email|unique:users',
                'creation_date' => 'nullable|date',
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
                'creation_date' => 'nullable|date',
                'city' => 'nullable',
                'country' => 'nullable',
                'phone' => 'nullable|digits:11',
            ]);
            $company->email = $request->email;
        }


        $company->name = $request->name;
        $company->birth_date = request('creation_date');
        $company->city = request('city');
        $company->country = request('country');
        $company->phone = request('phone');
        $company->save();

        return redirect()->route('company-profile.index')->with(['success' => 'Company Profile Edited Successfully']);
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
        $company = Auth::user();
        $this->validate($request, [
            'password' => 'required|confirmed|min:8'
        ]);
        $company->password = bcrypt($request->password);
        $company->save();
        return redirect()->back()->with(['success' => 'Password Updated Successfully!']);
    }
}
