<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class DashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AdminMiddleware');
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function jobs()
    {
        $jobs = Job::paginate(20);
        return view('dashboard.jobs.index',['jobs'=>$jobs]);
    }

    /**
     * @param Job $job
     * @return RedirectResponse
     */
    public function deleteJob(Job $job)
    {
        if($job = Job::find($job->id))
        {
            $job->delete();
            return redirect()->back()->with(['success' => 'Job Deleted Successfully!']);
        }
        else
        {
            return redirect()->back()->with(['error' => 'Job was not found.']);
        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function applications()
    {
        $applications = Application::paginate(20);
        return view('dashboard.applications.index' ,['applications'=>$applications]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function deleteApplication(Request $request)
    {
        $this->validate($request,[
            'applicant_id' => 'required|numeric',
            'job_id' => 'required|numeric',
        ]);
        if($application = Application::where('job_id','=',$request->job_id)->where('applicant_id','=',$request->applicant_id)->first())
        {
            $application->delete();
            return redirect()->back()->with(['success' => 'Application Deleted Successfully!']);
        }
        else
        {
            return redirect()->back()->with(['error' => 'Application was not found.']);
        }

    }



}
