<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\AnswerController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\QuestionController;
use App\Http\Controllers\Api\V1\ResultController;
use App\Http\Resources\Question\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
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

Route::prefix('v1/auth')->as('auth.')->group(function () {
    Route::middleware(['auth:sanctum'])
        ->post('logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::post('/test', [AuthController::class, 'test'])->name('test');
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});
