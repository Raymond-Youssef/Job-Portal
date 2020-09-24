<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Image;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
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
     * Store new image
     *
     * @param Request $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($validation->passes())
        {
            $currentUser = Auth::user();
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            if($currentUser->role->title=='admin' && isset($request->applicant_id))
            {
                $targetApplicant = Applicant::find($request->applicant_id);
            }
            else
            {
                $targetApplicant = Auth::user();
            }
            $this->authorize('change-image',$targetApplicant);
            if($path = $request->image->store('images'))
            {
                $image = new Image();
                $image->name = $name;
                $image->path = $path;
                $image->save();
                $oldImageId = $targetApplicant->image_id;
                $targetApplicant->image_id = $image->id;
                $targetApplicant->save();
                if($oldImage = Image::find($oldImageId))
                {
                    Storage::delete($oldImage->path);
                    $oldImage->delete();
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Image Uploaded Successfully',
                    'uploaded_image' => asset($image->path),
                    'class_name' => 'alert alert-success alert-block container',
                ]);
            }
        }
        return response()->json([
            'success' => false,
            'message' => $validation->errors()->all(),
            'uploaded_image' => '',
            'class_name' => 'alert alert-danger alert-block container'
        ]);
    }
}
