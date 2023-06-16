<?php

use App\Http\Controllers\Api\V1\AnswerController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\QuestionController;
use App\Http\Controllers\Api\V1\ResultController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', fn (Request $request) => $request->user())->name('index');

        Route::get('unanswered_questions', [QuestionController::class, 'indexByUnanswered'])->name('unanswered_questions');

        Route::apiResource('answers', AnswerController::class);

        Route::get('results', ResultController::class)->name('results.show');
    });

    Route::apiResources([
        'questions' => QuestionController::class,
        'categories' => CategoryController::class
    ]);
    Route::get('/categories/{category}/questions', [QuestionController::class, 'indexByCategory'])->name('categories.questions.index');
    Route::post('/categories/{category}/questions', [QuestionController::class, 'storeByCategory'])->name('categories.questions.store');
});