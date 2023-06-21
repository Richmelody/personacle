<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Result\ResultCollection;
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
            return \response()->json(
                [
                    "errors" => [
                        [
                            "title" => "Validation error",
                            "detail" => "You have some unanswered questions. Answer all the questions to get the result."
                        ]
                    ]
                ],
                422
            );
        }

        return ResultCollection::make($user->calculateResult())
            ->response();
    }
}
