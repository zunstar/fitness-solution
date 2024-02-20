<?php

namespace App\Interfaces\Fitness;

interface SolutionInterface{
    public function recommendSolution(array $tags): array;
}