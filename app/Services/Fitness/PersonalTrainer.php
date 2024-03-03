<?php

namespace App\Services\Fitness;

class PersonalTrainer {

    protected $solutionServices;

    public function __construct(array $solutionServices)
    {
        $this->solutionServices = $solutionServices;
    }

    public function getSolution(array $solutionTypes, array $tags) : array {
        $solutions = [];
        
        if (empty($solutionTypes)) {
            $solutionTypes = array_keys($this->solutionServices);
        }
        
        foreach ($solutionTypes as $type) {
            if (isset($this->solutionServices[$type])) {
                $service = $this->solutionServices[$type];
                $serviceSolutions = $service->recommendSolution($tags);
                $solutions = array_merge($solutions, $serviceSolutions);
            }
        }

        return $solutions;
    }
}