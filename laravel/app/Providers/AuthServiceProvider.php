<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

class AuthServiceProvider
{
   public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', fn($user) => $user->role === 'admin');
    }
}
