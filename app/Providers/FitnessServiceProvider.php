<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Fitness\PersonalTrainer;
use App\Services\Fitness\DietExpert;
use App\Services\Fitness\FitnessCoach;

class FitnessServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->when(PersonalTrainer::class)
          ->needs('$solutionProviders')
          ->give(function () {
              return [
                  'DIET' => $this->app->make(DietExpert::class),
                  'FITNESS' => $this->app->make(FitnessCoach::class),
              ];
          });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
