<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\Fitness\DietExpert;
use App\Services\Fitness\FitnessCoach;

class FitnessTest extends TestCase
{
     /** @test */
     public function recommends_solutions_diet_tags()
     {
         $dietExpert = new DietExpert();
         $solutions = $dietExpert->recommendSolution(['enough_money']);
 
         $this->assertNotEmpty($solutions);
         $this->assertIsArray($solutions);
     }

     /** @test */
     public function recommends_solutions_fitness_tags()
     {
         $dietExpert = new FitnessCoach();
         $solutions = $dietExpert->recommendSolution(['strong_will']);
 
         $this->assertNotEmpty($solutions);
         $this->assertIsArray($solutions);
     }
}


