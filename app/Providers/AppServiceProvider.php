<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $observers = [
        \App\Models\User::class => \App\Observers\UserObserver::class,
    ];

    protected $validators = [
        'phone' => \App\Validators\PhoneValidator::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();

        Carbon::setLocale('zh');

        $this->registerObservers();
        $this->registerValidators();
    }

    /**
     * Register observers.
     */
    protected function registerObservers()
    {
        foreach ($this->observers as $model => $observer) {
            $model::observe($observer);
        }
    }

    /**
     * Register validators.
     */
    protected function registerValidators()
    {
        foreach ($this->validators as $rule => $validator) {
            Validator::extend($rule, "{$validator}@validate");
        }
    }
}
