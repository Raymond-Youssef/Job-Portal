<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ResumeController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'resume'=> 'required|max:10000|mimes:doc,docx,pdf',
        ]);

        if($validation->passes())
        {
            $resume = $request->file('resume');
            $name = $resume->getClientOriginalName();
            if($path = $request->resume->store('resumes'))
            {
                $user = Auth::user();
                $resume = new Resume();
                $resume->name = $name;
                $resume->path = $path;
                $resume->user_id = $user->id;
                if(count($user->resumes)==0) {
                    $resume->default = true;
                }
                $resume->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Resume Uploaded Successfully',
                    'resume_name' => $name,
                    'resume_path' => asset($resume->path),
                    'class_name' => 'alert alert-success alert-block container',
                ]);

            }

        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all(),
                'uploaded_resume' => '',
                'class_name' => 'alert alert-danger alert-block container'
            ]);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Resume $resume
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Resume $resume)
    {
        Storage::delete($resume->path);
        if($resume->default)
        {
            $resume->delete();
            $user = Auth::user();
            $newDefaultResume = Resume::firstWhere('user_id', $user->id);
            if($newDefaultResume) {
                $newDefaultResume->default = true;
                $newDefaultResume->save();
            }
        }
        else{
            $resume->delete();
        }
        return redirect()->back()->with('success','Resume deleted successfully');
    }
}
