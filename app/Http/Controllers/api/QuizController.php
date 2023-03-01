<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizQuestionAnswerRequest;
use App\Http\Requests\QuizQuestionRequest;
use App\Http\Requests\QuizRequest;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionAnswer;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    
    public function quizes(){
        $quizes=Quiz::with('getQuestions','getQuestions.getAnswers')->get();
        return response()->json(['success'=>true,'errors'=>null,'data'=>$quizes]);
    }

    public function store(QuizRequest $data){
      
        $quiz=Quiz::create([
            'title'=>$data['title'],
            'description'=>$data['description'],
        ]);

        return response()->json(['success'=>true,'errors'=>null,'data'=>$quiz]);


    }

    public function storeQuestion(QuizQuestionRequest $data){
      
        $question=QuizQuestion::create([
            'quiz_id'=>$data['quiz_id'],
            'title'=>$data['title'],
            'is_mandatory'=>$data['is_mandatory']??'no',
        ]);

        return response()->json(['success'=>true,'errors'=>null,'data'=>$question]);


    }


    public function storeQuestionAnswer(QuizQuestionAnswerRequest $data){
      
        $answer=QuizQuestionAnswer::create([
            'question_id'=>$data['question_id'],
            'title'=>$data['title'],
            'is_correct'=>$data['is_correct']??'no',
        ]);

        return response()->json(['success'=>true,'errors'=>null,'data'=>$answer]);


    }
}
