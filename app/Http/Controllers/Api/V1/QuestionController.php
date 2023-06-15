<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Question\StoreQuestionByCategoryRequest;
use App\Http\Requests\Api\V1\Question\StoreQuestionRequest;
use App\Http\Requests\Api\V1\Question\UpdateQuestionRequest;
use App\Http\Resources\Api\V1\Category\CategoryResource;
use App\Http\Resources\Api\V1\Question\QuestionResource;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the unanswered questions for the user.
     */
    public function indexByUnanswered(Request $request)
    {
        /** @var \App\Models\User */
        $user = $request->user();

        $answered_questions = $user->answers()->getQuery()->pluck('question_id');

        $unanswered_questions = Question::query()
            ->whereNotIn('id', $answered_questions->toArray())
            ->simplePaginate(10, pageName: "unanswered_questions");

        return QuestionResource::collection($unanswered_questions);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::query()->simplePaginate(10, pageName: "questions");

        return QuestionResource::collection($questions);
    }

    /**
     * Display a listing of the resource by category.
     */
    public function indexByCategory(Category $category)
    {
        $questions = $category->questions()
            ->getQuery()
            ->simplePaginate(10, pageName: "category_questions");

        return QuestionResource::collection($questions)
            ->additional(['parent' => CategoryResource::make($category)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $validated = $request->validated()['data']['attributes'];

        $question = Question::query()->create($validated);

        return QuestionResource::make($question)
            ->response()
            ->header('Location', \route('questions.show', \compact('question')));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeByCategory(StoreQuestionByCategoryRequest $request, Category $category)
    {
        $validated = $request->validated()['data']['attributes'];

        $questions = $category->questions()->createMany($validated);

        if ($questions->count() == 1 && \filled($question = $questions->first())) {
            return QuestionResource::make($question)
                ->response()
                ->header('Location', \route('questions.show', \compact('question')));
        }

        return QuestionResource::collection($questions)
            ->response()
            ->header('Location', \route('categories.questions.index', \compact('category')));
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return QuestionResource::make($question);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $validated = $request->validated()['data']['attributes'];

        $question->update($validated);

        return QuestionResource::make($question);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return \response(\null, 204);
    }
}
