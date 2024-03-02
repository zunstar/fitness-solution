<?php

namespace App\Services\Fitness;

class PersonalTrainer {

    protected $solutionProviders;

    public function __construct(array $solutionProviders) {
        $this->solutionProviders = $solutionProviders;
    }

    public function getSolution(array $solutionTypes, array $tags) : array {
        $solutions = [];
        
        if (empty($solutionTypes)) {
            $solutionTypes = array_keys($this->solutionProviders);
        }
        foreach ($solutionTypes as $type) {
            if (isset($this->solutionProviders[$type])) {
                $provider = $this->solutionProviders[$type];
                $providerSolutions = $provider->recommendSolution($tags);
                
                $solutions = array_merge($solutions, $providerSolutions);
            }
        }

        return $solutions;
    }
}