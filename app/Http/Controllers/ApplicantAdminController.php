<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\Applicant;

class ApplicantAdminController extends Controller
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
    public function index()
    {
        $applicants = Applicant::simplePaginate(20);
        return view('dashboard.applicants.index',['applicants'=>$applicants]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Applicant $applicant
     * @return void
     */
    public function store(Applicant $applicant)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param Applicant $applicant
     * @return View
     */
    public function show(Applicant $applicant)
    {
        $applicant = Applicant::find($applicant->id);
        return view('dashboard.applicants.show',['applicant'=>$applicant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Applicant $applicant
     * @return View
     */
    public function edit(Applicant $applicant)
    {
        return view('dashboard.applicants.edit',['applicant'=>$applicant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Applicant $applicant
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Applicant $applicant)
    {
        $applicant = Applicant::find($applicant->id);
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

        return redirect()->route('applicant.index')->with(['success' => 'Applicant Edited Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
