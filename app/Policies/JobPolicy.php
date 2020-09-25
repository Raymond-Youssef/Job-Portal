<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Job $job
     * @return mixed
     */
    public function update(User $user, Job $job)
    {
        return ($job->company_id == $user->id || $user->role->title = 'admin');
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Job $job
     * @return mixed
     */
    public function delete(User $user, Job $job)
    {
        return ($job->company_id == $user->id || $user->role->title = 'admin');
    }
}
