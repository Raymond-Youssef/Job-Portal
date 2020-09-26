<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\Applicant;
use App\Models\Resume;


class ApplicationsController extends Controller
{


    //Application::where('job_id','=',$request->job_id)->where('applicant_id','=',$user->id)->get()
    //Application::where('applicant_id','=',1)->get()

    /**
     * ApplicationsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ApplicantMiddleware');
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $applications = Application::where('applicant_id','=',Auth::user()->id)->get();
        return view('application.index',['applications' => $applications]);
    }

    /**
     * Show the form for creating a new application.
     *
     * @param Job $job
     * @return View
     */
    public function create(Job $job)
    {
        $applicant = Applicant::find(Auth::user()->id);
        return view('application.create', [
            'job' => $job,
            'applicant' =>$applicant,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'resume' => 'required|numeric',
            'job_id' => 'required|numeric',
        ]);
        $user = Auth::user();
        if(count(Application::where('job_id','=',$request->job_id)->where('applicant_id','=',$user->id)->get())!=0)
        {
            return redirect()->route('search.jobs')->with(['error'=>'You already applied for this job']);
        }
        else
        {
            if($resume = Resume::find($request->resume))
            {
                $this->authorize('store-applications', $resume);
                $application = new Application();
                if($job = Job::find($request->job_id))
                {
                    $application->job_id = $request->job_id;
                }
                else
                {
                    return redirect()->back()->with(['error'=>'Job does NOT exist']);
                }
                $application->applicant_id = $user->id;
                $application->resume_id = $resume->id;
                if($application->save())
                {
                    return redirect()->route('search.jobs')->with(['success' => 'You Applied Successfully!']);
                }
                else
                {
                    return redirect()->back()->with(['error'=>'An error occurred, try again later']);
                }
            }
            else
            {
                return redirect()->back()->with(['error'=>'Resume does NOT exist']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Application $application
     * @return void
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Application $application
     * @return void
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Application $application
     * @return void
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Application $application
     * @return void
     */
    public function destroy(Application $application)
    {
        //
    }
}
