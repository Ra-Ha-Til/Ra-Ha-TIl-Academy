<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        // Define gates for each role
        Gate::define('admin', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('teacher', function ($user) {
            return $user->isTeacher();
        });

        Gate::define('student', function ($user) {
            return $user->isStudent();
        });

        Gate::define('parent', function ($user) {
            return $user->isParent();
        });

        // Define permissions
        Gate::define('view attendances', function ($user) {
            return $user->isAdmin() || $user->isTeacher();
        });

        Gate::define('manage attendances', function ($user) {
            return $user->isAdmin() || $user->isTeacher();
        });

        // Add more gates as needed for other resources
    }
}