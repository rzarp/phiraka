<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;   

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
        Validator::extend('name', function($attribute, $value, $parameters, $validator) {
            return preg_match('/^[a-zA-Z ]+$/u', $value);
        });
        Validator::replacer('name', function($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The ' . $attribute . ' field may only contain letters and spaces.');
        });
        
    }
}
