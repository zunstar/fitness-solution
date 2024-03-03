<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\Fitness\PersonalTrainer;
use App\Http\Requests\SolutionPostRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class FitnessController extends Controller
{
    public function solution(SolutionPostRequest $request, PersonalTrainer $trainer) : JsonResponse
    {
        try {
            $solutionTypes = $request->input('solutionTypes', []);
            $tags = $request->input('tags', []);

            $solutions = $trainer->getSolution($solutionTypes, $tags);

            return response()->json($solutions, Response::HTTP_OK);
        } catch (InvalidArgumentException $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
