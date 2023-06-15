<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        /** @var \App\Models\User */
        $user = Auth::user();

        if (!$user->completelyAnswered()) {
            return \response()->json([
                "errors" => [
                    [
                        "title" => "Validation error",
                        "detail" => "You have some unanswered questions. Answer all the questions to get the result."
                    ]
                ]
            ]);
        }

        return \response()
            ->json([
                'temperament' => [
                    'primary' => 'sanguine',
                    'secondary' => [
                        'title' => 'choleric',
                        'score' => 0.6
                    ]
                ],
                'personality_trait' => [
                    'conscientiousness' => 0.6,
                    'openness to experience' => 0.7,
                    'neuroticism' => 0.6,
                    'extraversion' => 0.5,
                    'agreeableness' => 0.5
                ]
            ]);
    }
}
