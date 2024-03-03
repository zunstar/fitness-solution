<?php

namespace App\Providers;

use App\Helpers\Fitness\SolutionRecommender;
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

        $this->app->singleton(SolutionRecommender::class, function ($app) {
            return new SolutionRecommender();
        });

        $this->app->when(PersonalTrainer::class)
          ->needs('$solutionServices')
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
