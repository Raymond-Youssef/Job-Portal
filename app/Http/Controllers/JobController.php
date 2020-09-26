<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class JobController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CompanyMiddleware');
    }

    /**
     * Display a listing of Jobs
     *
     * @return View
     */
    public function index()
    {
        $company = Company::find(Auth::user()->id);
        $jobs = $company->jobs()->orderBy('updated_at','desc')->paginate(10);
        return view('job.index',['jobs' => $jobs]);

    }

    /**
     * Show the form for creating a new job.
     *
     * @return View
     */
    public function create()
    {
        return view('job.create');
    }

    /**
     * Store a newly created Job in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        // Logged-in user
        $company = Auth::user();
        // Validation
        $this->validate($request,[
            'title' => 'required|string|max:255|min:5',
            'description' => 'required|min:10',
            'skills' => 'nullable|string',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
        ]);
        // Saving the newly created Job
        $job = new Job();
        $job->title = request('title');
        $job->description = request('description');
        $skillsArray = explode(',',request('skills'));
        // Turing skills into JSON
        $skills = '[';
        foreach($skillsArray as $skill)
        {
            $skills .= '"'.$skill.'"'. ',';
        }
        $skills = rtrim($skills, ",");
        $skills .= ']';
        $job->skills = $skills;
        $job->city = request('city');
        $job->country = request('country');
        $job->company_id = $company->id;
        $job->save();

        // Redirect to the index page
        return redirect()->route('job.index')->with(['success'=>'Job Added Successfully']);
    }

    /**
     * Show the form for editing the specified Job.
     *
     * @param  Job  $job
     * @return View
     */
    public function edit(Job $job)
    {
        return view('job.edit',['job'=>$job]);
    }

    /**
     * Show more information about the Job
     *
     * @param Job $job
     * @return View
     */
    public function show(Job $job)
    {
        $applications = $job->applications()->paginate(10);
        return view('job.show',[
            'job' => $job,
            'applications' => $applications,
        ]);
    }

    /**
     * Updates the status of an application.
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function updateStatus(Request $request)
    {
        $this->validate($request,[
            'status' => [
                'required', Rule::in(['Accepted', 'Rejected']),
            ],
            'job_id' => 'required|numeric',
            'applicant_id' => 'required|numeric'
        ]);
        if($application = Application::where('job_id','=',$request->job_id)->where('applicant_id','=',$request->applicant_id)->first())
        {
            $this->authorize('update-application-status', $application);
            $application->status = $request->status;
            $application->save();
            return redirect()->back()->with(['success' => 'Status updated successfully']);
        }
        else
        {
            return redirect()->back()->with(['error' => 'No application found']);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Job $job
     * @return RedirectResponse
     * @throws ValidationException
     * @throws AuthorizationException
     */
    public function update(Request $request, Job $job)
    {
        // Logged-in user
        $company = Auth::user();
        // Validation
        $this->authorize($job);
        $this->validate($request,[
            'title' => 'required|string|max:255|min:5',
            'description' => 'required|min:10',
            'skills' => 'nullable|string',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
        ]);
        // Saving the newly created Job
        $job->title = request('title');
        $job->description = request('description');
        $skillsArray = explode(',',request('skills'));
        // Turing skills into JSON
        $skills = '[';
        foreach($skillsArray as $skill)
        {
            $skills .= '"'.$skill.'"'. ',';
        }
        $skills = rtrim($skills, ",");
        $skills .= ']';
        $job->skills = $skills;
        // Done
        $job->city = request('city');
        $job->country = request('country');
        $job->company_id = $company->id;
        $job->save();

        // Redirect to the index page
        return redirect()->route('job.index')->with(['success'=>'Job Edited Successfully']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Job $job
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function destroy(Job $job)
    {
        $this->authorize($job);
        $job->delete();
        return redirect()->back()->with(['success'=>'Job deleted Successfully']);
    }
}
