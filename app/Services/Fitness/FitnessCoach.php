<?php

namespace App\Services\Fitness;

use App\Interfaces\Fitness\SolutionInterface;
use App\Helpers\Fitness\SolutionRecommender;

class FitnessCoach implements SolutionInterface
{
    protected $solutionRecommender;

    public function __construct(SolutionRecommender $solutionRecommender)
    {
        $this->solutionRecommender = $solutionRecommender;
    }

    public function recommendSolution(array $tags): array{
        $solutions = [
            [
                'solution' => 'Crossfit',
                'tags' => ['enough_money', 'strong_will'],
            ],
            [
                'solution' => 'Cardio Exercise',
                'tags' => ['strong_will'],
            ],
            [
                'solution' => 'Strength',
                'tags' => ['strong_will','enough_time'],
            ],
            [
                'solution' => 'Spinning',
                'tags' => ['enough_money'],
            ],
        ];

        return $this->solutionRecommender->recommend($solutions, $tags);

    }
}