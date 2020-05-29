<?php

namespace App\Providers;

use App\Information;
use App\Policies\InformationPolicy;
use App\Policies\QuizPolicy;
use App\Quiz;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Quiz::class => QuizPolicy::class,
        Information::class => InformationPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
