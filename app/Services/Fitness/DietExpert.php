<?php

namespace App\Services\Fitness;

use App\Interfaces\Fitness\SolutionInterface;
use App\Helpers\Fitness\SolutionRecommender;

class DietExpert implements SolutionInterface
{
    protected $solutionRecommender;

    public function __construct(SolutionRecommender $solutionRecommender)
    {
        $this->solutionRecommender = $solutionRecommender;
    }

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
        
        return $this->solutionRecommender->recommend($solutions, $tags);

    }
}