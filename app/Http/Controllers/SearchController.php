<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
class SearchController extends Controller
{

    /**
     * @param Request $request
     * @return View
     */
    public function jobs(Request $request)
    {
        $this->validate($request,[
            'search' => 'nullable|max:255'
        ]);
        $keyWord = $request->search;
        $jobs = Job::where('title','LIKE','%'.$keyWord.'%')
            ->orWhere('description','LIKE','%'.$keyWord.'%')
            ->orWhere('skills','LIKE','%'.$keyWord.'%')
            ->orWhere('city','LIKE','%'.$keyWord.'%')
            ->orWhere('country','LIKE','%'.$keyWord.'%')
            ->orderBy('updated_at','desc')
            ->paginate(10);
        return view('search.jobs', [
            'jobs'=>$jobs,
            'search'=>$keyWord,
        ]);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function companies(Request $request)
    {
        $keyWord = $request->search;
        $companies = Company::where('name','LIKE','%'.$keyWord.'%')
            ->orWhere('email','LIKE','%'.$keyWord.'%')
            ->orWhere('city','LIKE','%'.$keyWord.'%')
            ->orWhere('phone','LIKE','%'.$keyWord.'%')
            ->orWhere('country','LIKE','%'.$keyWord.'%')
            ->orderBy('updated_at','desc')
            ->paginate(10);
        return view('search.companies', [
            'companies'=>$companies,
            'search'=>$keyWord,
        ]);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function applicants(Request $request)
    {
        $keyWord = $request->search;
        $applicants = Applicant::where('name','LIKE','%'.$keyWord.'%')
            ->orWhere('job_title','LIKE','%'.$keyWord.'%')
            ->orWhere('phone','LIKE','%'.$keyWord.'%')
            ->orWhere('email','LIKE','%'.$keyWord.'%')
            ->orWhere('city','LIKE','%'.$keyWord.'%')
            ->orWhere('country','LIKE','%'.$keyWord.'%')
            ->orderBy('updated_at','desc')
            ->paginate(10);
        return view('search.applicants', [
            'applicants'=>$applicants,
            'search'=>$keyWord,
        ]);
    }
}
