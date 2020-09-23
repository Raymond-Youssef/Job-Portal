<?php

namespace App\Providers;

use App\Models\Resume;
use App\Models\User;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
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

        Gate::define('update-resume', function (User $user, Resume $resume) {
            return $user->id === $resume->user_id;
        });
    }
}
