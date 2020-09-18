<?php

namespace App\Providers;

use App\Information;
use App\InformationCategory;
use App\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       $infocategory = InformationCategory::all();
       $setting = Setting::first();

        if($infocategory&&$setting){
            View::share([
                'infocategory'    => $infocategory ,
                'setting' => $setting,
            ]);

        }//endif

    }
}
