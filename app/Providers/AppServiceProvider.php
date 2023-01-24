<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Institution;
use Auth;
use App\Admin;
use App\Http\Controllers\MyInstitution;
use App\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        
        $this->app->bind(Admin::class, function ($app) {
            return new Admin;
            });
    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function($view){
            if (auth()->check()) {
                $currentUser = auth()->user();
                $currentInstitution = Institution::where('id', $currentUser->institution_id)->first();
                view()->share('currentInstitution', $currentInstitution);
                view()->share('currentUserId', $currentUser->id);
            }
        });
         
    }
}
