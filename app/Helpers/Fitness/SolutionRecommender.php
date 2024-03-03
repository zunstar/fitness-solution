<?php
namespace App\Helpers\Fitness;

class SolutionRecommender
{
    public function recommend(array $solutions, array $tags): array {
        $tagFlip = array_flip($tags);
        $recommendedSolutions = array_filter($solutions, function ($solution) use ($tagFlip) {
            foreach ($solution['tags'] as $tag) {
                if (isset($tagFlip[$tag])) {
                    return true;
                }
            }
            return false;
        });

        return array_values($recommendedSolutions);
    }
}