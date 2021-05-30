<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
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
        $this->registerRequest();
    }

    /**
     * Register request marco.
     */
    public function registerRequest()
    {
        Request::macro('relations', function (array $allows = []) {
            $request = \request();

            if (!$request->has('with')) {
                return [];
            }

            $relations = \array_filter(\array_map('trim', \explode(';', $request->get('with'))));

            return  !empty($allows) ? array_intersect($allows, $relations) : $relations;
        });
    }
}
