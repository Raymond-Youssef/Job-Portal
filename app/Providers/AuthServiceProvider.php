<?php

namespace App\Providers;

use App\Models\Applicant;
use App\Models\Resume;
use App\Models\User;
use App\Policies\ResumesPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Resume::class => ResumesPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('edit-settings', function ($user) {
            return $user->isAdmin;
        });

        Gate::define('update-image', function ($user, $image) {
            return $user->image->is($image);
        });

        Gate::define('store-resume', function ($applicant) {
            return (Auth::user()->role->title=='admin' || $applicant == Auth::user());
        });

        Gate::define('change-image', function ($applicant) {
            return (Auth::user()->role->title=='admin' || $applicant == Auth::user());
        });


        Gate::define('destroy-applicants-resumes',function ($user){
           return $user->role->title=='admin';
        });


        Gate::define('store-applications', function (User $user, Resume $resume){
           return ($user->role->title=='admin' || $resume->user->is($user));
        });
    }
}
