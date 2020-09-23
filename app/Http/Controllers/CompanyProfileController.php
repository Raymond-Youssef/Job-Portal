<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $company = Auth::user();
        $image = $company->image;
        return view('companyProfile.master',[
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
        return view('companyProfile.edit',['company'=>$company]);
    }
}
