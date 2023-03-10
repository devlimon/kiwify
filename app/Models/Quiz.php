<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable=[
        'title','description'
    ];

    public function getQuestions(){
        return $this->hasMany(QuizQuestion::class);
    }

}
