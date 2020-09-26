<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyAdminController extends Controller
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
        $companies = Company::paginate(20);
        return view('dashboard.companies.index',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return View
     */
    public function show(Company $company)
    {
        $company = Company::find($company->id);
        return view('dashboard.companies.show',['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return View
     */
    public function edit(Company $company)
    {
        return view('dashboard.companies.edit',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Company $company
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Company $company)
    {
        $company = Company::find($company->id);
        if($company->email == request('email'))
        {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                //'email' => 'required|email|unique:users|max:255',
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
                'email' => 'required|email|unique:users|max:255|string',
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

        return redirect()->route('company.index')->with(['success' => 'Company Edited Successfully']);
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
