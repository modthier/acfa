<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ExamQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['question_answers'];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }


    public function getQuestionAnswersAttribute(Type $var = null)
    {
       return $this->examQuestionAnswers()->get();
    }

    public function examQuestionAnswers()
    {
        return $this->hasMany(ExamQuestionAnswer::class,'question_id');
    }

    public function correctAnswer($id)
    {
        $correct = DB::table('exam_questions as eq')
        ->select(['eqn.id'])
        ->leftJoin('exam_question_answers as eqn','eqn.question_id','eq.id')
        ->where('eqn.question_id',$id)
        ->where('eqn.correct',1)
        ->get();

        return $correct->first()->id;
    }

    
}
