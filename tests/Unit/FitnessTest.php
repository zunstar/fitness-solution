<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\Fitness\DietExpert;
use App\Services\Fitness\FitnessCoach;
use App\Helpers\Fitness\SolutionRecommender;

class FitnessTest extends TestCase
{

    protected $solutionRecommender;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solutionRecommender = new SolutionRecommender();
    }

     /** @test */
     public function recommends_solutions_diet_tags()
     {
         $dietExpert = new DietExpert($this->solutionRecommender);
         $solutions = $dietExpert->recommendSolution(['enough_money']);
 
         $this->assertNotEmpty($solutions);
         $this->assertIsArray($solutions);
     }

     /** @test */
     public function recommends_solutions_fitness_tags()
     {
         $dietExpert = new FitnessCoach($this->solutionRecommender);
         $solutions = $dietExpert->recommendSolution(['strong_will']);
 
         $this->assertNotEmpty($solutions);
         $this->assertIsArray($solutions);
     }
}


