<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ResumeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
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
     * Display the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = Resume::find($id);
        $url = Storage::url($file->path);
        echo '<img src="'.asset($file->path).'">';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(Resume $resume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resume $resume)
    {
        //
    }
}
