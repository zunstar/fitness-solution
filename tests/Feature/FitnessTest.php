<?php

namespace Tests\Feature;

use Tests\TestCase;

class FitnessTest extends TestCase
{

    /**
     * @test
     */
    public function fitness_solution_with_status(): void
    {
        $response = $this->postJson('/api/v1/fitness-solution', [
            "solutionTypes" => ["FITNESS"],
            "tags"=> ["enough_time"]
        ]);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function fitness_solution_with_tags_validation_status(): void
    {
        $response = $this->postJson('/api/v1/fitness-solution', [
            "solutionTypes" => ["FITNESS"],
            "tags"=> []
        ]);
        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function fitness_solution_with_empty_solution_types(): void
    {
        $response = $this->postJson('/api/v1/fitness-solution', [
            "solutionTypes" => [],
            "tags"=> ["enough_time"]
        ]);
 
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function fitness_solution_with_solution_types_enum_diet_fitness(): void
    {
        $response = $this->postJson('/api/v1/fitness-solution', [
            "solutionTypes" => ["NULL"],
            "tags"=> ["enough_time"]
        ]);
 
        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function fitness_solution_with_json_match(): void
    {
        $response = $this->postJson('/api/v1/fitness-solution', [
            "solutionTypes" => ["FITNESS"],
            "tags"=> ["enough_time"]
        ]);
 
        $response
            ->assertStatus(200)
            ->assertExactJson(
                [
                    [
                        "solution" => "Strength",
                        "tags" => ["strong_will","enough_time"]
                    ]
                ]
            );
    }
}
