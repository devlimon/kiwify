<?php

use App\Http\Controllers\api\QuizController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/quizes',[QuizController::class,'quizes'])->name('quizes');
Route::post('/quizes',[QuizController::class,'store'])->name('quizes.store');
Route::post('/quiz/questions',[QuizController::class,'storeQuestion'])->name('quiz.questions.store');
Route::post('/quiz/question/answers',[QuizController::class,'storeQuestionAnswer'])->name('quize.question.answers.store');
