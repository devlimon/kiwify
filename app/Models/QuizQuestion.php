<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $fillable=[
        'quiz_id',
        'title',
        'is_mandatory',
    ];

    
    public function getAnswers(){
        return $this->hasMany('App\Models\QuizQuestionAnswer','question_id','id');
    }

}
