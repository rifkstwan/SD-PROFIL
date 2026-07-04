<?php

namespace App\Providers;

use App\Models\SchoolProfile;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share school profile globally with all views
        try {
            View::share('profile', SchoolProfile::first());
        } catch (\Exception $e) {
            // Table might not exist yet during migration
        }
    }
}
