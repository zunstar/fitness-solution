<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\Fitness\PersonalTrainer;
use App\Http\Requests\SolutionPostRequest;

class FitnessController extends Controller
{
    public function solution(SolutionPostRequest $request, PersonalTrainer $trainer) : JsonResponse
    {
        $solutionTypes = $request->input('solutionTypes', []);
        $tags = $request->input('tags', []);

        $solution = $trainer->getSolution($solutionTypes, $tags);

        return response()->json($solution,200);
    }
}
