<?php

namespace App\Policies;

use App\Models\Applicant;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ResumesPolicy
{
    use HandlesAuthorization;



    /**
     * Determine whether the user can delete the resume.
     *
     * @param User $user
     * @param Resume $resume
     * @return mixed
     */
    public function destroy(User $user, Resume $resume)
    {
        return ($resume->user->is($user) || $user->role->title=='admin');
    }

    public function setDefault(User $user, Resume $resume)
    {
        return ($resume->user->is($user) || $user->role->title=='admin');
    }

}
