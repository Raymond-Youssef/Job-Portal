<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class ResumeController extends Controller
{
    /**
     * Set the specified resume as default
     * @param int $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function setDefault(int $id)
    {
        $user = Auth::user();
        $defaultResume = Resume::findOrFail($id);
        $this->authorize($defaultResume);
        $resumes = Resume::all()->where('user_id',$user->id);
        foreach ($resumes as $resume)
        {
            $resume->default = false;
            $resume->save();
        }
        $defaultResume->default=true;
        $defaultResume->save();
        return redirect()->back()->with('success','Default resume updated successfully');
    }

    /**
     * Store the new resume in storage
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
                if(count($user->resumes)==0) {
                    $resume->default = true;
                }
                $user->saveResume($resume);
                return response()->json([
                    'success' => true,
                    'message' => 'Resume Uploaded Successfully',
                    'resume_name' => $name,
                    'resume_path' => asset($resume->path),
                    'class_name' => 'alert alert-success alert-block container',
                ]);

            }

        }
        return response()->json([
            'success' => false,
            'message' => $validation->errors()->all(),
            'uploaded_resume' => '',
            'class_name' => 'alert alert-danger alert-block container'
        ]);
    }


    /**
     * Remove the specified resume from storage.
     *
     * @param Resume $resume
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Resume $resume)
    {
        $this->authorize('destroy',$resume);
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
