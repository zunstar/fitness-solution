<?php

namespace App\Services\Fitness;

use App\Interfaces\Fitness\SolutionInterface;

class FitnessCoach implements SolutionInterface
{
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

        $recommendedSolutions = array_filter($solutions, function ($solution) use ($tags) {
            return count(array_intersect($solution['tags'], $tags)) > 0;
        });

        return array_values($recommendedSolutions);
    }
}