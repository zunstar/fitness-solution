<?php

namespace App\Services\Fitness;

use App\Interfaces\Fitness\SolutionInterface;

class DietExpert implements SolutionInterface
{
    public function recommendSolution(array $tags): array{
        $solutions = [
            [
                "solution" => "Intermittent Fasting",
                "tags" => ["enough_time", "strong_will"],
            ],
            [
                "solution" => "LCHF",
                "tags" => ["enough_money"],
            ],
        ];

        $recommendedSolutions = array_filter($solutions, function ($solution) use ($tags) {
            return count(array_intersect($solution['tags'], $tags)) > 0;
        });

        return array_values($recommendedSolutions);
    }
}