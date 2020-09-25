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
     * Shows a listing of jobs by the searched keyword
     *
     * @param Request $request
     * @return View
     * @throws ValidationException
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
     * Shows the specified Job
     * @param Job $job
     * @return View
     */
    public function showJob(Job $job)
    {
        return view('search.show.job',['job'=>$job]);
    }

    /**
     * Shows a listing of companies by the searched keyword
     *
     * @param Request $request
     * @return View
     * @throws ValidationException
     */
    public function companies(Request $request)
    {
        $this->validate($request,[
            'search' => 'nullable|max:255'
        ]);
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
     * Shows the specified Job
     * @param Company $company
     * @return View
     */
    public function showCompany(Company $company)
    {
        return view('search.show.company',['company'=>$company]);
    }

    /**
     * Shows a listing of applicants by the searched keyword
     *
     * @param Request $request
     * @return View
     * @throws ValidationException
     */
    public function applicants(Request $request)
    {
        $this->validate($request,[
            'search' => 'nullable|max:255'
        ]);
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

    /**
     * Shows the specified Job
     * @param Applicant $applicant
     * @return View
     */
    public function showApplicant(Applicant $applicant)
    {
        return view('search.show.applicant',['applicant' => $applicant]);
    }

}
