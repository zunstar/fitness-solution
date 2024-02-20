<?php

namespace App\Services\Fitness;

class PersonalTrainer{

    protected $solution = [];

    public function __construct(array $solutionProviders)
    {
        $this->solution = $solutionProviders;
    }

    public function getSolution(string $solutionType, array $tags): array
    {
        if (isset($this->solution[$solutionType])) {
            return $this->solution[$solutionType]->recommendSolution($tags);
        }

        throw new \Exception("Unsupported solution type: {$solutionType}");
    }
}