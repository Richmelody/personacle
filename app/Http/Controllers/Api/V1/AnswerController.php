<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Http\Requests\Api\V1\Answer\StoreAnswerRequest;
use App\Http\Requests\Api\V1\Answer\UpdateAnswerRequest;
use App\Http\Resources\Api\V1\Answer\AnswerResource;
use App\Models\User;
use Doctrine\DBAL\Query\QueryException;

class AnswerController extends Controller
{
    public function getAuthUser(): User
    {
        return \auth()->user();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $answers = $this->getAuthUser()
            ->answers()
            ->getQuery()
            ->simplePaginate(15, pageName: 'answers');

        return AnswerResource::collection($answers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnswerRequest $request)
    {
        /** @var \App\Models\User */
        $user = $request->user();

        $validated = $request->validated()['data']['attributes'];

        //for now, delete all the answers for this user before saving a new set
        $user->answers()->getQuery()->delete();

        // create all the answers for the user
        $answers = $user->answers()->createMany($validated);

        if ($answers->count() == 1 && \filled($answer = $answers->first())) {
            return AnswerResource::make($answer)
                ->response();
        }

        return AnswerResource::collection($answers)
            ->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        $this->authorize('view', $answer);

        return AnswerResource::make($answer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        $this->authorize('update', $answer);

        $validated = $request->validated()['data']['attributes'];

        $answer->update($validated);

        return AnswerResource::make($answer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        $this->authorize('delete', $answer);

        $answer->delete();

        return \response(\null, 204);
    }
}
